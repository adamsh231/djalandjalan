<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Gallery;
use App\Join;
use App\Review;

class UserController extends Controller
{
    public function profile($user = null)
    {
        if(is_null($user)){
            if(!Auth::check()){
                return redirect('/');
            }
            $user = Auth::user();
        }else{
            $user = User::find($user);
        }
        $join = Join::with(
            [
                'partner' => function ($query) {
                    $query->with(['join'])->get();
                },
                'review'
            ]
        )->where('user_id', $user->id)->get();
        $gallery = Gallery::where('user_id', $user->id)->get();
        $review = Review::where('user_id', $user->id)->get();

        //! Redirect if null -> should be change to try catch !//
        if(is_null($user)){
            return redirect('/');
        }

        return view(
            'user/profile',
            [
                'user' => $user,
                'gallery' => $gallery,
                'join' => $join,
                'review' => $review
            ]
        );
    }

}
