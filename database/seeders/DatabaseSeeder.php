<?php

namespace Database\Seeders;

use App\Models\Referral;
use App\Models\ReferralCode;
use App\Models\TokenBalance;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        User::create([
            'name' => 'Test User',
            'email' => 'test@user.com',
            'role' => 'user',
            'password'=> Hash::make('pass@123'),
            'email_verified_at'=> now()
        ]);
        User::create([
            'name' => 'Test Admin',
            'email' => 'test@admin.com',
            'role' => 'admin',
            'password'=> Hash::make('pass@123'),
            'email_verified_at'=> now()       
        ]);
        User::create([
            'name' => 'Test Super',
            'email' => 'test@super.com',
            'role' => 'super',
            'password'=> Hash::make('pass@123'),
            'email_verified_at'=> now()       
        ]);
    ;

    //Referral Code Factory
    ReferralCode::create([
        'user_id'=>2,
        'code'=>'testcode'
    ]);

    Referral::create([
        'user_id'=>1,
        'code_id'=>1
    ]);

    //Balances factory
    TokenBalance::create([
        'user_id'=>1,
        'USDT'=>20,
        'Bitcoin'=>0,
        'Ethereum'=>0,
        'Tether'=>0,
        'Ripple'=>0 

    ]);
    }
}
