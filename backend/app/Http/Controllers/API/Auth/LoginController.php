<?php

namespace App\Http\Controllers\API\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Socialite;
use Illuminate\Http\Request;
use App\User;
use App\Http\Resources\Users;
use App\SocialiteUser;
use Tymon\JWTAuth\JWTAuth;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function __construct(JWTAuth $auth)
    {
        $this->auth = $auth;
    }

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
    }

    public function someThing()
    {
        return response()
            ->json(['name' => 'Abigail', 'state' => 'CA']);
    }

    public function login(Request $request)
    {
        $provider = $request->get('provider');
        $token = $request->get('token');
        try {
            $socialiteUser = Socialite::driver($provider)->userFromToken($token)->user;
        } catch (\Exception $e) {
            dd($e);
        }

        $uui = $socialiteUser['id'];

        $_socialiteUser = SocialiteUser::whereUui($uui)->whereProvider($provider)->first();

        if ($_socialiteUser) {
            $user_id = $_socialiteUser->user_id;
            $newUser = User::find($user_id)->first();
        } else {
            $newUser = User::create([
                'name' => $socialiteUser['name'],
                'email' => $socialiteUser['email'],
                'password' => Hash::make('abcxyz')
            ]);

            SocialiteUser::create([
                'provider' => $provider,
                'uui' => $uui,
                'user_id' => $newUser->id
            ]);
        }

        $token = $this->auth->fromUser($newUser);

        return response()->json(compact('token'));
    }

    public function getUser(Request $request)
    {
        $data = Auth::user();

        $user = [
            'id' => $data->id,
            'name' => $data->name,
            'email' => $data->email
        ];

        return response()->json(compact('user'));
    }
}
