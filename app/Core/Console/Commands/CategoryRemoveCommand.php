<?php

namespace App\Core\Console\Commands;

use App\Services\Category;
use Illuminate\Console\Command;

class CategoryRemoveCommand extends Command
{
    protected $signature = 'category:remove {id}';
    protected $description = 'Remove a category';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        try {
            $id = (int) $this->argument('id');
            app(Category::class)->delete($id);

            $this->info('Category Removed From Database');
        } catch (\Exception $e) {
            $this->error('Error: ' . $e->getMessage());
            $this->error('File: ' . $e->getFile());
            $this->error('Line: ' . $e->getLine());
        }
    }
}
