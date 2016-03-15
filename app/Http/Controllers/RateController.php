<?php

namespace App\Http\Controllers;

use Alert;
use App\Http\Controllers\Controller;
use App\Models\Rate;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class RateController extends Controller
{
    
    public function newrating()
    {
        $my_id = Auth::id();
        $score = Input::get('score');
        $date = Input::get('date');
        $directing = Input::get('directing');
        $lead_actors = Input::get('lead_actors');
        $supporting_cast = Input::get('supporting_cast');
        $music = Input::get('music');
        $experience = Input::get('experience');
        $mood = Input::get('mood');
        $with = Input::get('with');
        
        $new_rating = new Rate ();
        $new_rating->user_id = $my_id;
        $new_rating->movie_id = 42;
        $new_rating->rating = $score;
        $new_rating->date_watched = $date;
        $new_rating->directing = $directing;
        $new_rating->leading_actors = $lead_actors;
        $new_rating->supporting_cast = $supporting_cast;
        $new_rating->music = $music;
        $new_rating->experience = $experience;
        $new_rating->mood = $mood;
        $new_rating->watched_with = $with;
        $new_rating->save();

        Alert::add("You rated a move successfully!");
        return redirect()->route('rate');
    }

}