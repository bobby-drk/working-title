<?php

namespace App\Http\Controllers;

use App\Services\TMDBService;

class MovieController extends Controller
{
    public function example()
    {

https://api.themoviedb.org/3/search/movie?api_key=34fc67dfcf64236376b9f9ea3556646b&query=incept





        $tmdb = new TMDBService();

        $movie = $tmdb->getMovie(550);
        // echo "<pre>";
        // print_r($movie);
        // echo "</pre>";
        // echo "print_r located in <a href='#' title= '" . __FILE__ . "'>file</a> on line " . __LINE__;
        // exit;




        // echo "<pre>";
        // print_r($movie);
        // echo "</pre>";
        // echo "print_r located in <a href='#' title= '" . __FILE__ . "'>file</a> on line " . __LINE__;
        // exit;


        // echo $movie->getTitle();
        // exit;
        // $movie = $client->getMoviesApi()->getMovie(550);


// foreach($movie->getImages()->filter(
//         function ($key, $value) {
//             if ($value->getIso6391() == 'en' && $value instanceof \Tmdb\Model\Image\PosterImage) { return true; }
//         }
//     ) as $image) {
//     echo $imageHelper->getHtml($image, 'w154', 150);

//     printf(" - %s<br/>", $imageHelper->getUrl($image));
// }


// There are however some sensible default filters available for most collections
$image = $movie
    ->getImages()
    ->filterPosters()
    ->filterBestVotedImage()
;

echo $tmdb->getImageHelper()->getHtml($image, 'original', '1040');

exit;



        return $movie;
    }
}
