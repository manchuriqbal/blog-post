<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategoryPostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $posts = Post::all();
         $categories = Category::all();


         $posts->each(function ($post) use ($categories) {

             $post->categories()->attach(
                 $categories->random(rand(1, 3))->pluck('id')->toArray()
             );
         });
    }
}
