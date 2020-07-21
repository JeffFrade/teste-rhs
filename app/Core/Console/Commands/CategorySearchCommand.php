<?php

namespace App\Core\Console\Commands;

use App\Services\Category;
use Illuminate\Console\Command;

class CategorySearchCommand extends Command
{
    protected $signature = 'category:search {category?}';
    protected $description = 'Search categories with params or all categories';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $this->info('Categories in Database:');

            $category = $this->argument('category') ?? '';
            dump(app(Category::class)->search($category));
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
