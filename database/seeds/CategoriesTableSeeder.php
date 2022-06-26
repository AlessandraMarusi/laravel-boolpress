<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorieslist = ['Primi piatti', 'Secondi piatti', 'Contorni', 'Antipasti', 'Dolci'];
        forEach($categorieslist as $category){
            $newCategory = new Category();
            $newCategory->name = $category;
            $newCategory->slug = Str::of($newCategory->name)->slug('-');

            $newCategory-> save();
        }
    }
}
