<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Technology;
use Illuminate\Database\Seeder;

// Models

use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::truncate();

        User::factory()->create([
            'name' => 'Eduard',
            'email' => 'eduardcon@gmail.com',
        ]);

        $this->call([
            TypeSeeder::class,
            TechnologySeeder::class,
            ProjectSeeder::class
            
        ]);
    }
}
