<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\MovieResource;

class MovieController extends Controller
{
    //
    public function list ()
    {
        return \App\Models\Movie::limit(10)->get();
        return MovieResource::collection(\App\Models\Movie::all());
    }
}
