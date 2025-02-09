<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function userprofile()
    {
        return $this->hasOne(UsersProfiles::class , 'iduser');
    }
    public function seller()
    {
        return $this->hasMany(Products::class , 'idseller');
    }
    public function useroffer()
    {
        return $this->hasMany(Offers::class , 'idofuser');
    }
    public function verifyUser()
{
  return $this->hasOne('App\VerifyUser');
}

}