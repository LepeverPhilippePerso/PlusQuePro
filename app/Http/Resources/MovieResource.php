<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title',
            'overview',
            'adult',
            'original_language',
            'popularity',
            'release_date',
            'vote_average',
            'vote_count'
        ];
    }
}
