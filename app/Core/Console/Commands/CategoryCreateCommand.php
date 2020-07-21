<?php

namespace App\Core\Console\Commands;

use App\Services\Category;
use Illuminate\Console\Command;

class CategoryCreateCommand extends Command
{
    protected $signature = 'category:create {category}';
    protected $description = 'Create a category';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $category = $this->argument('category');
            dump(app(Category::class)->create($category));

            $this->info('Category Inserted in Database:');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
