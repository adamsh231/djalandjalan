<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Gallery;
use App\Join;
use App\Review;
use Illuminate\Support\Facades\Storage;

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
            $user = User::findOrFail($user);
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

    public function editProfile(Request $request){
        $request->validate([
            'name' => ['required'],
            'nick_name' => ['required'],
            'city' => ['required'],
            'birth' => ['required'],
            'gender' => ['required'],
            'picture' => ['mimes:jpeg,jpg,png', 'max:2056']
        ]);

        $user = User::find($request->user()->id);
        $user->name = $request->name;
        $user->nick_name = $request->nick_name;
        $user->city = $request->city;
        $user->birth = $request->birth;
        $user->gender = $request->gender;

        if($request->filled('description')){
            $user->description = $request->description;
        }

        if($request->has('picture')){
            $file = $request->file('picture');
            $file_name = $request->user()->id . "_" . strtotime($user->created_at) ."_" . time() . "." . strtolower($file->getClientOriginalExtension());
            $file->storeAs('file/profile/', $file_name, 'public');
            Storage::disk('public')->delete(substr($user->picture, strlen(url('').'/storage')));
            $user->picture = url('').'/storage/file/profile/'.$file_name;
        }

        $user->save();

        return redirect('/profile/setting');
    }

}
