<?php

namespace App\Http\Controllers\auth;

use App\Helpers\Alert;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Provider;
use App\Models\UserProvider;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class OAauthController extends Controller
{
    /**
     * check if the user has data in the user provider table.  If not add it.  Then log them in
     */

    public function callback($provider_name) {

        $auth_user = Auth::user();

        $redir = session('oauth_redir');
        session()->forget('oauth_redir');

        try {
            $provider = Provider::where('provider_safe_name', '=', $provider_name)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            exit;
        }

        $user = Socialite::driver($provider_name)->user();

        $local_user = UserProvider::where('provider_key', $user['id'])->first();

        if(count($local_user)) {
            $local_user = $local_user->user()->first();
        } else {

            if(empty($auth_user)) {
                $local_user = User::where('email', $user['email'])->first();
            } else {
                $local_user = $auth_user;
            }

            //not found by email either
            if(!count($local_user)) {

                //create user
                $local_user = User::create([
                    'first_name' => $user['name'],
                    'email'=> $user['email']
                ]);

                UserProvider::create([
                    'provider_id' => $provider->id,  //FB is first provider
                    'user_id'=> $local_user['id'],
                    'provider_key'=> $user['id']
                ]);

            } else {
                //update user with
                UserProvider::create([
                    'provider_id' => $provider->id,
                    'user_id'=> $local_user['id'],
                    'provider_key'=> $user['id']
                ]);
            }

        }

        Auth::login($local_user, true);

        switch($redir) {
            case "profile":
                Alert::add("Social network has been added to your profile", ["alert_type" => "success"]);
                break;
        }

        return redirect()->route($redir);;

    }
    /**
     * Send User to Oauth URL
     */
    public function connect($provider_name, $redir) {

        session(['oauth_redir' => $redir]);

        try {
            $provider = Provider::where('provider_safe_name', '=', $provider_name)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            echo 'Caught exception: ',  $e->getMessage(), "\n";
            exit;
        }

        return Socialite::driver($provider_name)->redirect();

    }


}
