<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\genres;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\movies>
 */
class moviesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => 'https://picsum.photos/200/300',
            'slug' => $this->faker->text,
        ];
    }
}
