<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Auth;
use Illuminate\Auth\Events\Registered;
use Socialite;

class SocialController extends Controller
{
    public function FacebookCallback()
    {
        $getInfo = Socialite::driver('facebook')->user();
        $user = User::where('id_facebook', $getInfo->id)->first();
        if ($user) {
            Auth::login($user);
            return redirect(RouteServiceProvider::HOME);
        } elseif ($this->createUser($getInfo)) {
            return redirect(RouteServiceProvider::HOME);
        }
    }

    function createUser($getInfo)
    {
        $user = User::where('id_facebook', $getInfo->id)->first();
        if (!$user) {
            \Illuminate\Support\Facades\Auth::login($user = \App\Models\User::create([
                'name' => $getInfo->name,
                'avata' => $getInfo->avatar,
                'login_type' => 'facebook',
                'id_facebook' => $getInfo->id
            ]));
            event(new Registered($user));
        }
        return true;
    }

}
