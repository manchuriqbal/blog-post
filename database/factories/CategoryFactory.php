<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = fake()->word();
        return [
            'name' => $title,
            'slug' => Str::slug($title . '-' . fake()->unique()->numberBetween(1, 10000)),
            'thumbnail' => fake()->imageUrl(),
            'active' => true,
            'parent_id' => Category::query()->inRandomOrder()->value('id') ?: null,

        ];
    }
}
