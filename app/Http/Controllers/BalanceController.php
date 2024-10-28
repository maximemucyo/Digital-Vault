<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\TokenBalance;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;


class BalanceController extends Controller
{
    public function update(Request $request,$userId): RedirectResponse
    {

        $token_balance=TokenBalance::query()->where('user_id',$userId)->first();
        $token_balance->fill($request->all());
        $token_balance->save();

        return Redirect::route('user',['user'=>$userId])->with('status', 'balance-updated');
    }
}
