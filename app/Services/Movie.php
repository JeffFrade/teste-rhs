<?php

namespace App\Services;

use App\Helpers\StringHelper;
use App\Repositories\CategoryRepository;
use App\Repositories\MovieCategoryRepository;
use App\Repositories\MovieRepository;

class Movie
{
    private $movieRepository;
    private $movieCategoryRepository;
    private $categoryRepository;

    public function __construct()
    {
        $this->movieRepository = new MovieRepository();
        $this->movieCategoryRepository = new MovieCategoryRepository();
        $this->categoryRepository = new CategoryRepository();
    }

    public function searchTitle(string $title)
    {
        return $this->movieRepository->searchTitle(StringHelper::removeAccents($title));
    }

    public function create(string $title, array $categories)
    {
        $this->validateCreateMovie($title);
        array_map(array($this, 'verifyCategory'), $categories);

        $data = [
            'title' => StringHelper::removeAccents($title)
        ];

        $movie = $this->movieRepository->create($data);

        $this->insertMovieCategory($movie->id, $categories);

        return $movie->toArray();
    }

    public function delete(int $id)
    {
        $this->validateDeleteCategory($id);
        $this->movieCategoryRepository->deleteCustom('id_movie', $id);
        $this->movieRepository->delete($id);
    }

    private function validateCreateMovie(string $title)
    {
        $movieInDb = $this->movieRepository->findFirst('title', $title);

        if (!empty($movieInDb)) {
            throw new \Exception('Movie Existent');
        }
    }

    private function insertMovieCategory(int $idMovie, array $categories)
    {
        foreach ($categories as $category)
        {
            $data = [
                'id_movie' => $idMovie,
                'id_category' => $category
            ];

            $this->movieCategoryRepository->create($data);
        }
    }

    private function verifyCategory($item)
    {
        $category = $this->categoryRepository->findFirst('id', $item);

        if (empty($category)) {
            throw new \Exception('Category Nonexistent');
        }
    }

    private function validateDeleteCategory(int $id)
    {
        $movie = $this->movieRepository->findFirst('id', $id);

        if (empty($movie)) {
            throw new \Exception('Movie Nonexistent');
        }
    }
}
