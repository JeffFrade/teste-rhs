<?php

namespace App\Services;

use App\Helpers\StringHelper;
use App\Repositories\CategoryRepository;
use App\Repositories\MovieCategoryRepository;
use App\Repositories\MovieRepository;

class Category
{
    private $categoryRepository;
    private $movieRepository;
    private $movieCategoryRepository;

    public function __construct()
    {
        $this->categoryRepository = new CategoryRepository();
        $this->movieRepository = new MovieRepository();
        $this->movieCategoryRepository = new MovieCategoryRepository();
    }

    public function search(string $category = '')
    {
        return $this->categoryRepository->search($category);
    }

    public function create(string $category)
    {
        $this->validateCreateCategory($category);

        $data = [
            'category' => $category
        ];

        return $this->categoryRepository->create($data)
            ->toArray();
    }

    public function delete(int $id)
    {
        $this->validateDeleteCategory($id);
        $this->verifyToDelete($id);

        $this->movieCategoryRepository->deleteCustom('id_category', $id);
        $this->categoryRepository->delete($id);
    }

    private function validateCreateCategory(string $category)
    {
        $category = StringHelper::removeAccents($category);
        $categoryInDb = $this->categoryRepository->findFirst('category', $category);

        if (!empty($categoryInDb)) {
            throw new \Exception('Category Existent');
        }
    }

    private function validateDeleteCategory(int $id)
    {
        $category = $this->categoryRepository->findFirst('id', $id);

        if (empty($category)) {
            throw new \Exception('Category Nonexistent');
        }
    }

    private function verifyToDelete(int $id)
    {
        $movies = $this->movieCategoryRepository->getMoviesByCategory($id);

        foreach ($movies as $movie) {
            $movieInDb = $this->movieRepository->getMovieWithCategories($movie->id_movie);
            
            if (count($movieInDb->categories) <= 1) {
                throw new \Exception('This Category Belongs To a Movie With One Category Only');
            }
        }
    }
}
