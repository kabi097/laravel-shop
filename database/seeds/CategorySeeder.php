<?php

use App\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            "Women's Fashion",
            "Men's Fashion",
            "Phones & Telecommunications",
            "Computer",
            "Consumer Electronics",
            "Jewelry",
            "Home",
            "Bags",
            "Toys",
            "Outdoor Fun & Sports",
            "Beauty, Health",
            "Automobiles & Motorcycles",
            "Home Improvement"
        ];

        collect($names)->each(function ($name) {
            $category = new Category();
            $category->name = $name;
            $category->save();
        });
    }
}
