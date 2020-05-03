<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function join(){
        return $this->hasMany('App\Join');
    }
    public function comment(){
        return $this->hasMany('App\Comment');
    }
}
