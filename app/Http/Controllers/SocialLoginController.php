<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Socialite;

class SocialLoginController extends Controller
{

    public function redirect($provider){
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider){
        $providerUser = Socialite::driver($provider)->user();

        $providerUserInfo = $providerUser->user;


        // dd($providerUser->user["picture"]);

        $user = User::updateOrCreate([
            "name" => $providerUserInfo["name"],
            "email" => $providerUserInfo["email"],
            "media_id" =>  null,
        ]);

        $user->socialAccounts()->updateOrCreate([
            "provider_name" => $provider,
            "provider_id" => $providerUser->id,
            "image" => $providerUserInfo["picture"]
        ]);

        Auth::login($user);

        return redirect('/user');
    }

}
