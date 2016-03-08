<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RateController extends Controller
{
    
    public function newrating()
    {
        $my_id = \Illuminate\Support\Facades\Auth::id();
        $new_rating = new \App\Models\Rate ();
        $new_rating->user_id = $my_id;
        $new_rating->movie_id = 2;
        $new_rating->rating = '25';
        $new_rating->save();
        
//        Variables from the page:
//        score
//        date
//        directing
//        lead_actors
//        supporting_cast
//        other
//        experience
//        mood
//        with
//        
    }

}