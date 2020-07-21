<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Movie;

class MovieRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Movie();
    }

    public function getMovieWithCategories(int $id)
    {
        return $this->model->with('categories')
            ->where('id', $id)
            ->first();
    }
}
