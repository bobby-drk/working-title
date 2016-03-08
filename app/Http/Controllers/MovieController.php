<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Repository\MovieRepository;

class MovieController extends Controller
{
    public function example()
    {
        $token  = new ApiToken(env('TMBD_KEY'));
        $client = new Client($token);

        // $repository = new MovieRepository($client);
        // $movie      = $repository->load(87421);

        // echo "<pre>";
        // print_r($movie);
        // echo "</pre>";
        // echo "print_r located in <a href='#' title= '" . __FILE__ . "'>file</a> on line " . __LINE__;
        // exit;


        // echo $movie->getTitle();
        // exit;
        // $movie = $client->getMoviesApi()->getMovie(550);


$configRepository = new \Tmdb\Repository\ConfigurationRepository($client);
$config = $configRepository->load();

$imageHelper = new \Tmdb\Helper\ImageHelper($config);

echo $imageHelper->getHtml(87421, 'w154', 154, 80);
exit;


        return $movie;
    }
}
