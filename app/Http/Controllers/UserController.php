<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Gallery;
use App\Join;

class UserController extends Controller
{
    public function overview(){
        $gallery = Gallery::where('user_id', Auth::user()->id)->get();
        return view('user/profile', ['gallery' => $gallery]);
    }
}
