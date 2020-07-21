<?php

namespace App\Core\Console\Commands;

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

        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
}
