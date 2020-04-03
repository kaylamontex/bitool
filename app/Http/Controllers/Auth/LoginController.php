<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the Okta authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('okta')->redirect();
    }

    /**
     * Obtain the user information from Okta.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback(\Illuminate\Http\Request $request)
    {
        $user = Socialite::driver('okta')->user();

        $localUser = User::where('email', $user->email)->first();

        // Create a local user with the email and tokens from Okta
        if (! $localUser) {
            $localUser = User::create([
                'email' => $user->email,
                'name'  => $user->name,
                'access_token' => $user->accessTokenResponseBody['access_token'],
                'id_token' => $user->accessTokenResponseBody['id_token'],
            ]);
        } else {
            // if the user already exists, just update the tokens:
            $localUser->access_token = $user->accessTokenResponseBody['access_token'];
            $localUser->id_token = $user->accessTokenResponseBody['id_token'];
            $localUser->save();
        }

        try {
            Auth::login($localUser);
        } catch (\Throwable $e) {
            return redirect('/login-okta');
        }

        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
