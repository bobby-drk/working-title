<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use App\Models\Provider;
use Auth;
// use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Input;

class UserController extends Controller
{
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




}