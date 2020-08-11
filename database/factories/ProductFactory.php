<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Category;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->text(40),
        'price' => rand(1, 1200),
        'description' => $faker->realText(400),
        'quantity' => rand(1,10),
        'date' => $faker->dateTimeBetween('now', '+12 months'),
        'category_id' => Category::all()->random(1)->first()->id
    ];
});
