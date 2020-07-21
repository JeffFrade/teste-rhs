<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Repositories\Models\Category;
use Faker\Generator as Faker;

$factory->define(Category::class, function (Faker $faker) {
    return [
        'category' => \App\Helpers\StringHelper::removeAccents($faker->firstName)
    ];
});
