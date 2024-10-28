<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral;
use App\Models\TokenBalance;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\ValidationException;
use App\Models\ReferralCode;
use Illuminate\Validation\NotFoundHttpException;
use Illuminate\Http\JsonResponse;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create($token): View
    {
        
        $referralCode = ReferralCode::where('code', $token)->first();

        if ($referralCode) {
        
            return view('auth.register', compact('token'));
        } else {
            // Token does not exist, throw a NotFoundHttpException
            throw new NotFoundHttpException('Invalid referral code');
        }
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request,$token): JsonResponse
    {
        try {
            // Validate the request data
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        } catch (ValidationException $e) {
            info($e->errors());
            // Return validation errors as JSON
            return response()->json([
                'status' => 'error',
                'errors' => $e->errors()
            ], 422);
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create the user balances
        TokenBalance::create([
            'USDT'=>0,
            'Bitcoin'=>0,
            'Ethereum'=>0,
            'Tether'=>0,
            'Ripple'=>0,
            'user_id' => $user->id, 
        ]);


        if ($token) {
            $referralCode = ReferralCode::where('code', $token)->first();
            if ($referralCode) {
                $referral = Referral::create([
                    'code_id' => $referralCode->id,
                    'user_id' => $user->id,
                ]);
                
                $referralCode->save();
            }
        }

        // Fire the Registered event
        event(new Registered($user));

        // Log the user in
        Auth::login($user);

        $token= $user->createToken('login');

        return new JsonResponse([
            'token' => $token->plainTextToken
        ], 200);
    }
}