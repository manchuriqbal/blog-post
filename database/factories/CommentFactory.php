<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'comment' => fake()->sentence(),
            'post_id' => Post::inRandomOrder()->value('id'),
            'user_id' => User::inRandomOrder()->value('id'),
            'comment_id' => null,
        ];
    }
}
