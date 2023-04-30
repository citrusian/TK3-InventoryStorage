<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username',
        'firstname',
        'lastname',
        'email',
        'password',
        'password_confirmation',
        'address',
        'city',
        'country',
        'postal',
        'about'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'password_confirmation',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * Always encrypt the password when it is updated.
     *
     * @param $value
    * @return string
    */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    protected $appends = [
        'profile_photo_url',
    ];

    public function getHasAdmin()
    {
        return $this->attributes['idtype'];
    }









//    protected $with = ['profile'];
//
//    public function profile()
//    {
//        return $this->morphTo();
//    }
//
//    public function getHasAdminProfileAttribute()
//    {
//        return $this->profile_type == 'App\Models\AdminProfile';
//    }
//    public function getHasCustomerProfileAttribute()
//    {
//        return $this->profile_type == 'App\Models\CustomerProfile';
//    }

//    Get Bool User Type
//User::find(2)->hasAdminProfile
//User::find(2)->hasCustomerProfile

//Get all form Customer
//$customers = User::where(‘profile_type’,’App\Models\Customer’)->get();







}
