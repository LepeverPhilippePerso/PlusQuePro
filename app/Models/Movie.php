<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use HasFactory;
    use Searchable;

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

    public function toSearchableArray()
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'overview' => $this->overview,
            'original_title' => $this->original_title,
            'release_date' => $this->release_date,
        ];
    }
}
