<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('token_balances', function (Blueprint $table) {
            $table->id();
            $table->float('BTCUSDT')->default(0);
            $table->float('DOGEUSDT')->default(0);
            $table->float('ETHUSDT')->default(0);
            $table->float('BNBUSDT')->default(0);
            $table->float('BTCBUSD')->default(0);
            $table->float('ETHBUSD')->default(0);
            $table->float('LTCUSDT')->default(0);        
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('token_balances');
    }
};
