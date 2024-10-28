<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class TokenBalance extends Model
{
    use HasFactory;

    protected $fillable = [  
        'user_id',
        'BTCUSDT',
        'DOGEUSDT',
        'ETHUSDT',
        'BNBUSDT',
        'BTCBUSD',
        'ETHBUSD',
        'LTCUSDT'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
