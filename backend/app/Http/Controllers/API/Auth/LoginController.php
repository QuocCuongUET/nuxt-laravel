<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Socialite;

class LoginController extends Controller
{
    /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $user = Socialite::driver($provider)->stateless()->user();
        dd($user);
        // $user->token;
    }

    public function someThing()
    {
        return response()
            ->json(['name' => 'Abigail', 'state' => 'CA']);
    }
}
