<?php

namespace App\Core\Console\Commands;

use App\Services\Movie;
use Illuminate\Console\Command;

class MovieCreateCommand extends Command
{
    protected $signature = 'movie:create {title} {categories_id*}';
    protected $description = 'Create a movie';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $title = $this->argument('title');
            $categoriesId = $this->argument('categories_id');

            dump(app(Movie::class)->create($title, $categoriesId));

            $this->info('Movie Inserted in Database');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
