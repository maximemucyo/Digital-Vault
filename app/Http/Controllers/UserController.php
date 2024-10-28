<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function user($userId){
        $user=User::query()->where('id',$userId)->first();
        return view('admin.user', compact('user'));
    }
}
