<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Join extends Model
{
    protected $table = 'join';
    protected $guarded = ['id'];

    public function user(){
        return $this->belongsTo('App\User');
    }
    public function partner(){
        return $this->belongsTo('App\Partner');
    }
}
