<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\movies;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\reviews>
 */
class reviewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'movies_id' => movies::factory(),
            'users_id' => User::factory(),
            // 'review' => $this->faker->in(1, 5),
            'review' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(100),
        ];
    }
}
