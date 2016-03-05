<?php

namespace App\Http\Controllers;

use Alert;
use App\Services\SocialNetwork;
use App\Models\Provider;
use App\Models\UserProvider;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Input;
use Socialite;

class UserController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | User Controller - Profile page + parts,
    |--------------------------------------------------------------------------
    |
    | This controller handles the user accounts (not related to authentication),
    |     profile pages, and basic user manipulation.
    |
    */



    /**
     * Simple control to load the profile page
     *
     * @return view
     */
    public function load_profile()
    {
        $user = Auth::user();
        $user_providers = User::find($user->id)->providers;
        $data['providers']  = Provider::all();
        $data['user']       = $user;

        foreach($data['providers'] as $i => $provider) {
            foreach($user_providers as $j => $my_provider) {

                if($provider->id == $my_provider->id) {
                    $data['providers'][$i]->owned = TRUE;
                }
            }
        }

        return view('pages.profile', $data);
    }

    /**
     * Save user data from profile page
     *
     * @return view (via redirect)
     */
    public function save_profile()
    {

        $user = Auth::user();
        $user->first_name = Input::get('first_name');
        $user->last_name = Input::get('last_name');
        $user->email = Input::get('email');

        $user->save();

        Alert::add("Your profile data has been saved!");
        return redirect()->route('profile');
    }


    /**
     * Allow a user to save password.  Return them to profile page on completion
     *
     * @return view (via redirect)
     */
    protected function change_password(Request $request)
    {
        $id = Auth::id();
        $user = User::find($id);

        if(Hash::check(Input::get('current'), $user->password) || $user->password == "")
        {
            $this->validate($request, [
                'password' => 'required|confirmed|min:6',
            ]);

            //encrype password first
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            Alert::add("Password Changed", ["alert_type" => "success"]);

        } else {
            Alert::add("Current password is not correct", ["alert_type" => "danger"]);
        }

        return redirect()->route('profile');
    }

    /**
     * Remove user a social network connection from a user
     *
     * @return view (via redirect)
     */
    public function remove_provider($provider_id)
    {
        $id = Auth::id();
        $deletedRows = UserProvider::where(['user_id' => $id, 'provider_id' => $provider_id])->delete();

        Alert::add("Social network removed from profile", ["alert_type" => "success"]);
        return redirect()->route('profile');
    }
}