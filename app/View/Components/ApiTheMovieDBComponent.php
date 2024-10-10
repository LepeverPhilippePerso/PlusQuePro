<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Movie;
use Illuminate\Support\Facades\Http;

class ApiTheMovieDBComponent extends Component
{
    /**
     * Constants to connect to api
     */
    private const API_KEY = "eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiIyMjJkNjNjZGRjMDY2ZDk5ZWQzZTgwNmQzMjY3MThjYSIsInN1YiI6IjYyNGVhNTRhYjc2Y2JiMDA2ODIzODc4YSIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.zuuBq1c63XpADl8SQ_c62hezeus7VibE1w5Da5UdYyo";
    private const URL_API = "https://api.themoviedb.org/3";

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.api-the-movie-d-b-component');
    }
    /**
     * Return a prepared Http's object with parameters
     */
    private function getHttpObject() {
        return Http::baseUrl(self::URL_API)->withToken(self::API_KEY)->withOptions([
            //'debug' => true,
            'verify' => false
        ]);
    }
    /**
     * Return URL all movies with paginate
     */
    private function getURLAllMoviesParPage(int $page = 1){
        $page = ($page >= 1) ? $page : 1;
        return '/trending/movie/day?language=fr-FR&page=' . $page;
    }

    /**
     * function that standardizes data the film
     */
    private function manipulateDataAfterGet(array &$dataMovie) : array
    {
        // Swicth id in themoviedb_id
        $dataMovie['themoviedb_id'] = $dataMovie['id'];
        unset($dataMovie['id']);
        // Standardize the title
        if(!isset($dataMovie['title']) && isset($dataMovie['name'])){
            $dataMovie['title'] = $dataMovie['name'];
        } else {
            $dataMovie['title'] = 'unknown';
        }
        // Standardize the original_title
        if(!isset($dataMovie['original_title']) && isset($dataMovie['original_name'])){
            $dataMovie['original_title'] = $dataMovie['original_name'];
        } else {
            $dataMovie['original_title'] = 'unknown';
        }
        // Standardize the original_title
        if(!isset($dataMovie['release_date']) && isset($dataMovie['first_air_date'])){
            $dataMovie['release_date'] = $dataMovie['first_air_date'];
        }
        return $dataMovie;
    }

    /**
     * Save in DBB all movies by iterating
     * return 
     *      true : success
     *      false : the API's function has run into a problem or no result
     */
    public function SaveAllMoviesParPage(int $page) : bool {
        $httpObect = self::getHttpObject();
        $response = $httpObect->get(self::getURLAllMoviesParPage($page))->json();

        // Check results
        if(empty($response['results']))
            return false;

        foreach($response['results'] as $movieInAPI){

            if($movieInAPI['media_type'] !== 'movie')
                continue;

            self::manipulateDataAfterGet($movieInAPI);
            /*
            $movieInAPI['themoviedb_id'] = $movieInAPI['id'];
            unset($movieInAPI['id']);
            if(!isset($movieInAPI['title']) && isset($movieInAPI['name'])){
                $movieInAPI['title'] = $movieInAPI['name'];
            } else {
                $movieInAPI['title'] = 'unknown';
            }
            if(!isset($movieInAPI['original_title']) && isset($movieInAPI['original_name'])){
                $movieInAPI['original_title'] = $movieInAPI['original_name'];
            } else {
                $movieInAPI['original_title'] = 'unknown';
            }
            if(!isset($movieInAPI['release_date']) && isset($movieInAPI['first_air_date'])){
                $movieInAPI['release_date'] = $movieInAPI['first_air_date'];
            }
                */
            
            \App\Models\Movie::updateOrCreate(['themoviedb_id' => $movieInAPI['themoviedb_id']], $movieInAPI);
        }
        return true;
    }

    /**
     * Endpoint : Save in DBB all movies
     */
    public function SaveAllMovies()
    {
        $httpObect = self::getHttpObject();
        $response = $httpObect->get(self::getURLAllMoviesParPage())->json();

        for($page = $response['page'] ; $page <= $response['total_pages'] ; $page++)
        {
            $success = self::SaveAllMoviesParPage($page);
            if(!$success)
            {
                break;
            }
        }
    }
}
