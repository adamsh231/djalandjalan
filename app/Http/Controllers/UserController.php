<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Gallery;
use App\Join;
use App\Review;

class UserController extends Controller
{
    public function profile()
    {
        $join = Join::with(
            [
                'partner' => function ($query) {
                    $query->with(['join'])->get();
                },
                'review'
            ]
        )->where('user_id', Auth::user()->id)->get();
        $gallery = Gallery::where('user_id', Auth::user()->id)->get();
        $review = Review::where('user_id', Auth::user()->id)->get();
        return view(
            'user/profile',
            [
                'gallery' => $gallery,
                'join' => $join,
                'review' => $review
            ]
        );
    }

    public function profilex(User $user)
    {
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
        return view(
            'user/profilex',
            [
                'user' => $user,
                'gallery' => $gallery,
                'join' => $join,
                'review' => $review
            ]
        );
    }
}
