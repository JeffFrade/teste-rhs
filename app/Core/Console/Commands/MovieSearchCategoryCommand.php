<?php

namespace App\Core\Console\Commands;

use App\Services\Movie;
use Illuminate\Console\Command;

class MovieSearchCategoryCommand extends Command
{
    protected $signature = 'movie:search_category {category?}';
    protected $description = 'Search a movie by category';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $category = $this->argument('category') ?? '';

            $this->info('Movies in Database:');

            dump(app(Movie::class)->searchCategory($category));

        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
