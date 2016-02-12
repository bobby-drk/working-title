<?php

namespace App\Http\Controllers;

use Alert;
use App\User;
use App\UserProvider;
use Auth;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Input;

class UserController extends Controller
{
    public function load_profile()
    {
        $user = Auth::user();
        // $id = Auth::id();
        $user['providers'] = User::find($user->id)->providers;

        return view('pages.profile', $user);
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