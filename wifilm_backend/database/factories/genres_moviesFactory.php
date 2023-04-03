<?php

namespace Database\Factories;

use App\Models\genres;
use App\Models\movies;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movies>
 */
class genres_moviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'genres_id' => genres::factory(),
            'movies_id' => movies::factory(),
        ];
    }
}
