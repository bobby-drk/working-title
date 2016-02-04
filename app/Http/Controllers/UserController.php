<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProvider;
use Auth;
use Input;
use Alert;


class UserController extends Controller
{
    public function load_profile()
    {
        $data['user'] = Auth::user();

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


}