<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\actors;
use App\Models\genres;
use App\Models\movies;
use App\Models\genres_movies;
use App\Models\reviews;
use Database\Factories\moviesgenresFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // genres::factory(10)->create();
        // movies::factory(10)->create();
        actors::factory(50)->create();
        genres_movies::factory(100)->create();
        // reviews::factory(300)->create();
        \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);
    }
}
