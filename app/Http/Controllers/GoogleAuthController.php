<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Socialite;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleAuthController extends Controller
{
    public function redirectToProvider()
    {
        $driver = 'google';
        return Socialite::driver($driver)->redirect();
    }

    public function handleProviderCallback()
    {
        $driver = 'google';
        $data = Socialite::driver($driver)->user();

        //* First returning an instant not updating the table or using updateOrNew to Updating when Sign in
        $user = User::firstOrNew(
            ['email' => $data->user['email']],
            [
                'name' => $data->user['name'],
                'picture' => $data->user['picture'],
                'password' => Hash::make($data->user['id']), //! Potential Security Issue!
                'email_verified_at' => Carbon::now(),
            ]
        );

        $user->save();
        Auth::loginUsingId($user->id);
        return redirect('/');
    }
}
