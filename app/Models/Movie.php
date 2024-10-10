<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
		'themoviedb_id',
        'title',
		'backdrop_path',
		'original_title',
		'overview',
        'poster_path',
        'media_type',
        'adult',
        'original_language',
        'popularity',
        'release_date',
        'video',
        'vote_average',
        'vote_count'
	];
}
