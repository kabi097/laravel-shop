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
        $names = ["Teatr", "Koncerty", "W plenerze", "Kino", "Imprezy masowe"];

        collect($names)->each(function ($name) {
            $category = new Category();
            $category->name = $name;
            $category->save();
        });
    }
}
