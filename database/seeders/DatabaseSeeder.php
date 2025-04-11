<?php

namespace Database\Seeders;

use App\Models\Speaker;
use App\Models\Talk;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admi@gmail.com',
            'password' => bcrypt('admi123'),
        ]);

        Speaker::factory()->create([
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'bio' => fake()->text(),
            'twitter_handle' => fake()->word(),
            'user_id' => 1,
        ]);

        User::factory()->create([
            'name' => 'Employer',
            'email' => 'employer@gmail.com',
            'password' => bcrypt('employer123'),
        ]);

        Speaker::factory()->create([
                'name' => fake()->name(),
                'phone_number' => fake()->phoneNumber(),
                'bio' => fake()->text(),
                'twitter_handle' => fake()->word(),
                'user_id' => 2,
        ]);


        Talk::factory(30)->create();
    }
}
