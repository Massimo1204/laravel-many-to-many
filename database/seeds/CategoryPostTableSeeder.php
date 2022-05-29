<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\Category;
use Faker\Generator as Faker;

class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $category_ids = Category::pluck('id')->toArray();

        $posts = Post::all();

        foreach ($posts as $post) {
            $post->categories()->attach($faker->randomElements($category_ids, rand(1,5)));
        }
    }
}
