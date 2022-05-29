<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run( Faker $faker)
    {
        $categories = ['Beauty', 'Funny', 'Nature', 'Animals', 'Cute', 'Sport', 'Technology', 'Business', 'Math', 'Science', 'Family', 'Friends', 'Cars', 'Space'];

        foreach ($categories as $category) {
            $newCategory = new Category;
            $newCategory->name = $category;
            $newCategory->color = $faker->hexColor();
            $newCategory->save();
        }
    }
}
