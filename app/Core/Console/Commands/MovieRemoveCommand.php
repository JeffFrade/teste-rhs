<?php

namespace App\Core\Console\Commands;

use App\Services\Movie;
use Illuminate\Console\Command;

class MovieRemoveCommand extends Command
{
    protected $signature = 'movie:remove {id}';
    protected $description = 'Remove a movie';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $id = $this->argument('id');

            app(Movie::class)->delete($id);
            $this->info('Movie Removed From Database');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
