<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->name(),
            'rating' => fake()->randomFloat(1, .1, 10.0),
            'genre' => fake()->randomElement(['action', 'horror', 'drama', 'sci-fi', 'comedy', 'romance', 'fantasy', 'other']),
        ];
    }
}
