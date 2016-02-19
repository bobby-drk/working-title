<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Auth\Redirect;
use App\Http\Controllers\Controller;
use App\Models\UserProvider;
use App\User;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Socialite;
use Validator;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;
    protected $redirectPath = '/';
    protected $redirectAfterLogout = '/login';
    // protected $loginPath    = '/login';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'getLogout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }


    /**
     * Redirect the user to the Facebook authentication page.
     *
     * @return Response
     */
    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return Response
     */
    public function handleFBCallback()
    {
        $user = Socialite::driver('facebook')->user();

        $local_user = UserProvider::where('provider_key', $user['id'])->first();

        if(count($local_user)) {
            $local_user = $local_user->user()->first();
        } else {

            $local_user = User::where('email', $user['email'])->first();

            //not found by email either
            if(!count($local_user)) {

                //create user
                $local_user = User::create([
                    'first_name' => $user['name'],
                    'email'=> $user['email']
                ]);

                UserProvider::create([
                    'provider_id' => 1,  //FB is first provider
                    'user_id'=> $local_user['id'],
                    'provider_key'=> $user['id']
                ]);

            } else {
                //update user with
                UserProvider::create([
                    'provider_id' => 1,
                    'user_id'=> $local_user['id'],
                    'provider_key'=> $user['id']
                ]);
            }

        }


        Auth::login($local_user, true);

        return redirect($this->redirectPath);//I think this is a FB issue currently

    }

}
