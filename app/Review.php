<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $table = 'review';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function join(){
        return $this->belongsTo('App\Join');
    }
}
