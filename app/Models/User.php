<?php

namespace App\Models;


use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\ReferralCode;
use App\Models\Referral;
use Illuminate\Database\Eloquent\Relations\HasOne;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function referralCode(): HasOne 
    {
        return $this->hasOne(ReferralCode::class);
    }

    public function referral(): HasOne 
    {
        return $this->hasOne(Referral::class);
    }

    /*
        Get the referral code
    */
    public function getReferralCode(): string 
    {
        $ref = $this->referralCode()->first();

        if ($ref) {
            return $ref->code; 
        }

        return ''; 
    }

    /*
        Check role
    */

    public function hasRole($role)
    {
        return $this->role === $role;
    }

      /*
        Get the admin who referred user
    */

    public function getReferrer(){
        $ref = $this->referral()->first();
        if($ref){
        $code= $ref->code_id;       
        $referrerID= ReferralCode::query()->where('id',$code)->first();
        $referrer=$this->query()->where('id',$referrerID->user_id)->first();
        
        if ($referrer) {
            return $referrer;
        }
        return '';
    }

    }

     /*
        Get the referrals that used an admin's link
    */

    public function getReferees(){
        $referall_code = $this->referralCode()->first();
        if($referall_code){
            $referees = Referral::query()->where('code_id', $referall_code->id)->get();
            if($referees){
                return $referees;
            }
        }
     
       
    }

      /*
        Get all users
    */

    public function getUsers(){
        $users=$this->all();
        if($users){
            return $users;
        }
    }

     /*
        Get all admins
    */

    public function getAdmins(){
        $admins=User::query()->where('role','admin')->get();
        if($admins){
            return $admins;
        }
    }

    public function getBalances(){
        $balaces = TokenBalance::query()->where('user_id',$this->id)->first();
        if($balaces){
            return $balaces;
        } 
    }
}