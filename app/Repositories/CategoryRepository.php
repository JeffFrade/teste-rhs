<?php

namespace App\Repositories;

use App\Core\Support\AbstractRepository;
use App\Repositories\Models\Category;

class CategoryRepository extends AbstractRepository
{
    public function __construct()
    {
        $this->model = new Category();
    }
}
