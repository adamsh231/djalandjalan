<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function partner(){
        return $this->belongsTo('App\Partner');
    }
    public function reply(){
        return $this->hasMany('App\Reply');
    }
}
