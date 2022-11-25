<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Category;
use Database\Factories\CategoriesFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::factory()
        ->times(3)
       // ->hasArticles(4)
        ->create();
    }
}
