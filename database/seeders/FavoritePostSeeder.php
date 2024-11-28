<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FavoritePostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = Post::all();
        $users = User::all();

        $posts->each(function($post) use ($users){
            $post->users()->attach(
                $users->random(rand(1,3))->pluck('id')->toArray()
            );
        });
    }
}
