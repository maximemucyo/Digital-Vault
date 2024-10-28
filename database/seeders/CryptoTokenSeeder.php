<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CryptoTokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $tokens = [
            ['token' => 'BTCUSDT'],
            ['token' => 'DOGEUSDT'],
            ['token' => 'ETHUSDT'],
            ['token' => 'BNBUSDT'],
            ['token' => 'BTCBUSD'],
            ['token' => 'ETHBUSD'],
            ['token' => 'LTCUSDT'],
        ];

        DB::table('crypto_tokens')->insert($tokens);
    }
}
