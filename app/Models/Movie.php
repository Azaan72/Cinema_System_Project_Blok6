<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'movies_genres', 'movie_id', 'genre_id');
    }

    public function performances()
    {
        return $this->hasMany(Performance::class);
    }
}
