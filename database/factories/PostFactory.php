<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->sentence();
        return [
            'title' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(1, 10000)),
            'author_id' => User::all()->random()->id,
            'content' => fake()->paragraph(),
            'thumbnail' => fake()->imageUrl(),
            'published_at' => fake()->dateTimeThisYear(),
            'status' => fake()->randomElement(['draft', 'published', 'archived']),
        ];
    }
}
