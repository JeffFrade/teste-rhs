<?php

namespace App\Core\Console\Commands;

use App\Services\Movie;
use Illuminate\Console\Command;

class MovieSearchNameCommand extends Command
{
    protected $signature = 'movie:search_name {title?}';
    protected $description = 'Search a movie by name';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $title = $this->argument('title') ?? '';

            $this->info('Movies in Database:');

            dump(app(Movie::class)->searchTitle($title));

        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
