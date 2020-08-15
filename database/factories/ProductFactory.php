<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;
use App\Category;

$factory->define(Product::class, function (Faker $faker) {
    $name = ['Koncert', 'Recital', 'Spektakl muzyczny', 'Spektakl', 'Benefis', 'Występ', 'Pokaz', 'Przedstawienie', 'Zlot fanów'];
    $group = ['grupy', 'zespołu', 'duetu', 'orkiestry', 'formacji', 'kapeli', 'grupy teatralnej', 'wokalistów', 'grupy młodzieżowej'];

    return [
        'title' => $name[array_rand($name)] . ' ' . $group[array_rand($group)] . ' "' . strtoupper($faker->words(rand(1,3), true)) . '" w ' . $faker->city,
        'price' => rand(1, 200),
        'description' => $faker->text(400),
        'quantity' => rand(1,10),
        'date' => $faker->dateTimeBetween('now', '+12 months'),
        'category_id' => Category::all()->random(1)->first()->id,
        'featured' => rand()%2>0 && rand()%2>0
    ];
});
