<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ReferralCode;
use File;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Validation\Rules\Password;

class AdminController extends Controller
{
    public function addAdmin(Request $request){
        try {
            // Validate the request data
            $request->validate([
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
            ]);
        } catch (ValidationException $e) {
            info($e->errors());
        return redirect('/admins');
        }

        // Create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=>'admin',
            'password' => Hash::make( $request->password),
        ]);
        
        $code=Str::random(4);

        /*Admin referral code creation */
        ReferralCode::create([
            'code'=>$code,
            'user_id'=>$user->id,
        ]);

        /* Admin csv for chart creation */
        $path = public_path('chart_data');
        $folders = File::directories($path);

        foreach ($folders as $folder) {

            $csvFileName = "{$user->id}.csv";
            $csvFilePath = "{$folder}/{$csvFileName}"; 

            $defaultCsvPath = "{$folder}/default.csv"; 
            
            // Check if default.csv exists
            if (!File::exists($defaultCsvPath)) {
                continue; 
            }

            // Read data from default.csv
            $data = array_map('str_getcsv', file($defaultCsvPath));

            $fileHandle = fopen($csvFilePath, 'w');

            // Write each row to the admin CSV file
            foreach ($data as $row) {
                fputcsv($fileHandle, $row);
            }

            fclose($fileHandle);
        }
    
        return response()->json(['success' => 'Admin Created!'], 200);
        
    }

    //view admin details
    public function admin($adminId){
        $admin=User::query()->where('id',$adminId)->first();
        $referees= $admin->getReferees();

        return view('super.admin', compact('admin','referees'));
    }

    //edit admin details
    public function adminSettings($adminId):View{

        $admin=User::query()->where('id',$adminId)->first();

        return view('super.admin_settings', compact('admin'));
    }

    //Upate admin profile
    public function updateAdminDetails(Request $request, $adminId): RedirectResponse
    {
        $admin=User::query()->where('id',$adminId)->first();
        $admin->fill($request->all());

        if ($admin->isDirty('email')) {
            $admin->email_verified_at = null;
        }

        $admin->save();

        return Redirect::route('admin.settings',['admin'=>$admin])->with('status', 'profile-updated');
    }

    public function updateAdminPassword(Request $request,$adminId): RedirectResponse
    {
        $admin=User::query()->where('id',$adminId)->first();
        $validated = $request->validateWithBag('updatePassword', [
            'password' => ['required', Password::defaults(), 'confirmed'],
        ]);

        $admin->update([
            'password' => Hash::make($validated['password']),
        ]);

        return back()->with('status', 'password-updated');
    }

    //delete admin
    public function destroy($adminId): RedirectResponse
    {
      
        $admin=User::query()->where('id',$adminId)->first();

        $admin->delete();

        return Redirect::to('/admins');
    }
}
