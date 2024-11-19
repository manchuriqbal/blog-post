<?php

namespace Database\Factories;

use App\Models\Post;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PostView>
 */
class PostViewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ip' => fake()->ipv4(),
            'view_count' => fake()->numberBetween(1, 100000),
            'post_id' => Arr::random(Post::pluck('id')->toArray()),
            'session_id' => fake()->uuid(),
        ];
    }
}
