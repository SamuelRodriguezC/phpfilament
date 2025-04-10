<?php

namespace Database\Seeders;

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

        Talk::factory(30)->create();
    }
}
