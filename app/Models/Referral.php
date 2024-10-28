<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'code_id',
        'user_id'
    ];
   
    public function referral()
    {
        return $this->belongsTo(ReferralCode::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
