<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\MovieCategory;

class MovieCategoryRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new MovieCategory();
    }

    public function getMoviesByCategory(int $idCategory)
    {
        return $this->model->where('id_category', $idCategory)
            ->get();
    }
}
