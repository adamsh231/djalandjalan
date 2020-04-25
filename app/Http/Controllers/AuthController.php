<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $messages = [
            'required' => 'The :attribute cannot be empty',
            'email' => 'The email address must be valid, ex: xxx@yyy.com',
            'accepted' => 'You may not register your account, unless you agree with our terms and conditions',
        ];
        $validator = Validator::make(
            $request->all(),
            [
                'name' => ['required'],
                'email' => ['required', 'email'],
                'password' => ['required', 'min:8'],
                'phone' => ['required', 'numeric'],
                'agreement' => ['accepted'],
            ],
            $messages
        );

        if ($validator->fails()) {
            return response()->json([
                'error'    => true,
                'messages' => $validator->errors(),
            ], 422);
        }

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->save();

        return response()->json(
            [
                'error' => false,
            ],
            200
        );
    }

    public function login(Request $request)
    {
        $isRemember = false;
        if($request->remember == "true"){
            $isRemember = true;
        }
        if (Auth::attempt($request->only('email', 'password'), $remember = $isRemember)) {
            return response()->json([
                'error' => false,
            ], 200);
        } else {
            return response()->json([
                'error' => true,
            ], 404);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
