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
}
