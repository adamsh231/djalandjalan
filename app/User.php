<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $table = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'remember_token'];

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

    public function partner(){
        return $this->hasMany('App\Partner');
    }
    public function join(){
        return $this->hasMany('App\Join');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
    public function reply(){
        return $this->hasMany('App\Reply');
    }
    public function gallery(){
        return $this->hasMany('App\Gallery');
    }
    public function notification(){
        return $this->hasMany('App\Notification');
    }
    public function review(){
        return $this->hasMany('App\Review');
    }
}
