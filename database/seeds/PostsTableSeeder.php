<?php

use Illuminate\Database\Seeder;
use App\Models\Post;
use App\User;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user_ids = User::pluck('id')->toArray();

        for ($i=0; $i < 50; $i++) { 
            $newPost = new Post;
            $newPost->user_id = $faker->randomElement($user_ids);
            $newPost->title = $faker->realText(50);
            $newPost->content = $faker->realText(500);
            $newPost->image_source = "https://picsum.photos/id/$i/450/600";
            $newPost->slug = "slugPlaceHolder-12341414141214252236";
            $newPost->save();
            $newPost->slug = Str::slug($newPost->title, '-') . "-$newPost->id";
            $newPost->save();
        }
    }
}
