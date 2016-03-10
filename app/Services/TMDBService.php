<?php

namespace App\Services;

use Tmdb\ApiToken;
use Tmdb\Client;
use Tmdb\Helper\ImageHelper;
use Tmdb\Model\Image\PosterImage;
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

    /**
     * Using the TMDB KEY (obtained from website) create a token, and a client object.
     *    TMDB Key is stored in .env
     *
     * @return Tmdb\Client
     */
    public function getClient()
    {
        $this->token = new ApiToken(env('TMBD_KEY'));
        $this->client = new Client($this->token);

        return $this->client;
    }


    /**
     * Using a Tmdb\Client (created if needed) create a new MovieRepository.
     *
     * @return Tmdb\Repository\MovieRepository
     */
    public function getMovieRepository()
    {
        if(empty($this->client)) {

            $this->getClient();
        }

        $this->repository = new MovieRepository($this->client);

        return $this->repository;
    }

    /**
     * cast movie id as int, and check to see if it is true.  If there is a repository,
     * get the movie, if not, get a repository.  Get movie using repo and movie id, return value.
     *  return a 0 on fail.
     *
     * @param int movie_id
     * @return Tmdb\Repository\MovieRepository
     */
    public function getMovie($movie_id)
    {
        $movie_id = (int) $movie_id;
        if ($movie_id) {
            if(empty($this->repository)) {
                $this->getMovieRepository();
            }

            return $this->repository->load($movie_id);
        } else {
            return 0;
        }

    }

    /**
     * Builds a configureation repository config.  Used for getting images.
     *
     * @return Tmdb\Repository\ConfigurationRepository
     */
    public function getRepository ()
    {
        if(empty($this->client)) {

            $this->getClient();
        }

        $this->configRepository = new ConfigurationRepository($this->client);
        $this->config = $this->configRepository->load();

        return $this->config;
    }


    /**
     * Using a repositoryConfig (created if needed) build a Image helper object
     *
     * @return Tmdb\Helper\ImageHelper
     */
    public function getImageHelper ()
    {
        if(empty($this->config)) {

            $this->getRepository();
        }

        $this->imageHelper = new ImageHelper($this->config);

        return $this->imageHelper;

    }

    /**
     * Using the movie object get the most popular english poster and return HTML
     * @param  $movie
     * @param  $size (default 120)
     * @return image HTML
     */
    public function getPoster ($movie, $size = 120)
    {
        if(!empty($movie)) {

            $poster = $movie
                ->getImages()
                ->filter(
                    function ($key, $value) {
                        if ($value->getIso6391() == 'en' && $value instanceof PosterImage) { return true; }
                    }
                )
                ->filterBestVotedImage();

            if(empty($this->imageHelper)) {
                $this->getImageHelper();
            }

            return $this->imageHelper->getHtml($poster, 'original', $size);

        } else {
            return 0;
        }

    }
}