<?php

namespace App\Services;

use App\Repositories\CategoryRepository;

class Category
{
    private $categoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
    }

    public function search(string $category = '')
    {
        return $this->categoryRepository->search($category);
    }
}
