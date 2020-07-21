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
}
