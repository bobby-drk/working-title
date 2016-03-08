<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MovieController extends Controller
{

    public function load_profile()
    {
    $user = Auth::user();
    // $id = Auth::id();
    $user['providers'] = User::find($user->id)->providers;

    return view('pages.profile', $user);
    }
}
