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

    public function search(string $category = '')
    {
        return $this->model->where('category', 'like', '%' . $category . '%')
            ->orderBy('category')
            ->get()
            ->toArray();
    }
}
