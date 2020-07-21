<?php

namespace App\Services;

use App\Helpers\StringHelper;
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

    public function create(string $category)
    {
        $category = StringHelper::removeAccents($category);
        $categoryInDb = $this->categoryRepository->findFirst('category', $category);

        if (!empty($categoryInDb)) {
            throw new \Exception('Category Existent');
        }

        $data = [
            'category' => $category
        ];

        return $this->categoryRepository->create($data)
            ->toArray();
    }

    public function delete(int $id)
    {
        $category = $this->categoryRepository->findFirst('id', $id);

        if (empty($category)) {
            throw new \Exception('Category Nonexistent');
        }

        $this->categoryRepository->delete($id);
    }
}
