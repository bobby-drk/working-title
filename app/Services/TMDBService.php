<?php

namespace App\Services;

use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Helper\ImageHelper;
use Tmdb\Repository\ConfigurationRepository;
use Tmdb\Repository\MovieRepository;

/**
 * TMDb Rules - DISCONTINUE IF FAILURE TO MEET THESE REQUIREMENTS

 *  - We need to show the TMDb logo on the auto complete.
 *  - No cloaking
 *  - No cacheing metadata or photos (This one might be a problem)
 *  - We can't use the data w/ anything that breaks the law or is overal sleezy
 *  - Can't sell TMDb Data - this only becomes and an issues when we are ready to get bought out
 *
 *  - If we decide to charge for anything we'll need to get a Commercial License - Advertiseing is ok
 *  -
 */

class TMDBService
{
    private $token;
    private $client;
    private $repository;
    private $configRepository;
    private $config;
    private $imageHelper;


    public function __construct()
    {
    }


    public function getClient()
    {
        $this->token = new ApiToken(env('TMBD_KEY'));
        $this->client = new Client($this->token);

        return $this->client;
    }


    public function getMovieRepository()
    {
        if(empty($this->client)) {

            $this->getClient();
        }

        $this->repository = new MovieRepository($this->client);

        return $this->repository;
    }

    public function getMovie($movie_id)
    {
        $this->getMovieRepository();

        return $this->repository->load($movie_id);

    }

    public function getRepository ()
    {
        if(empty($this->client)) {

            $this->getClient();
        }

        $this->configRepository = new ConfigurationRepository($this->client);
        $this->config = $this->configRepository->load();
    }



    public function getImageHelper ()
    {
        if(empty($this->config)) {

            $this->getRepository();
        }

        $this->imageHelper = new ImageHelper($this->config);

        return $this->imageHelper;

    }

//     public function getPoster ($movie, $size)
//     {
//         if() {
// $backdrop = $movie
//     ->getImages()
//     ->filterPosters()
//     ->filterBestVotedImage()
// ;

// echo $tmdb->getImageHelper()->getHtml($backdrop, 'original', '1040');

//         }

//     }







    public function search()
    {
    }
}