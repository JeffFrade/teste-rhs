<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MovieCategory extends Model
{
    use SoftDeletes;

    protected $table = 'movie_categories';
    protected $fillable = [
        'id_movie',
        'id_category'
    ];

    protected $with = [
        'movies'
    ];

    public function movies()
    {
        return $this->belongsTo(Movie::class, 'id_movie', 'id');
    }
}
