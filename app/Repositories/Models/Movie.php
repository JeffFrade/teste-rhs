<?php

namespace App\Repositories\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use SoftDeletes;

    protected $table = 'movies';
    protected $fillable = [
        'title'
    ];

    public function categories()
    {
        return $this->hasMany(MovieCategory::class, 'id_movie', 'id');
    }
}
