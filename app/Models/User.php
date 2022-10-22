<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Models\Feature\Mitra;
use App\Models\Feature\UserCourse;
use App\Models\Feature\Wallet;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;
 
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

   
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $appends = [
        'role_name',
    ];

    // Relation

    public function Mitra()
    {
        return $this->hasOne(Mitra::class);
    }

    public function UserCourse()
    {
        return $this->hasMany(UserCourse::class);
    }

    public function UserWallet()
    {
        return $this->hasOne(Wallet::class);
    }



    // Check

    public function isMitra()
    {
        if($this->mitra()->count() > 0){
            return true;
        }
        return false;
    }

  
    public function getRoleNameAttribute()
    {
        return $this->roles->pluck('name')[0];
    }
}
