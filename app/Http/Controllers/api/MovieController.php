<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\Response;

class MovieController extends Controller
{
    //
    public function list ()
    {
        return \App\Models\Movie::limit(10)->get();
        return MovieResource::collection(\App\Models\Movie::all());
    }
    //
    public function read(int $id)
    {
		$movie = \App\Models\Movie::find($id);
        
        if ($movie) {
            return Response::json(
                [
                    'success' => true,
                    'movie' => $movie,
                    'message' => "Movie retrieved successfully.",
                ]
            );
        } else {
            return Response::json(
                [
                    'success' => false,
                    'message' => "Movie not found!",
                ], 404);
        }
	}
    function search(Request $request){
        $movies = \App\Models\Movie::search(trim($request->get('search')) ?? '')->get();
 
        return Response::json(
            [
                'success' => true,
                'movies' => $movies,
                'message' => "The movies search was successful.",
            ]);
    }
}
