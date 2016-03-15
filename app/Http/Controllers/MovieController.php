<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\TMDBService;

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

    public function example()
    {

// https://api.themoviedb.org/3/search/movie?api_key=34fc67dfcf64236376b9f9ea3556646b&query=incept





        $tmdb = new TMDBService();

        $movie = $tmdb->getMovie(550);
        // echo "<pre>";
        // print_r($movie);
        // echo "</pre>";
        // echo "print_r located in <a href='#' title= '" . __FILE__ . "'>file</a> on line " . __LINE__;
        // exit;

        // echo $movie->getImdbId();
        // echo $movie->getTitle();

// echo $tmdb->getPoster($movie, '400');

// exit;



        return view('pages.movie_example');
    }
}
