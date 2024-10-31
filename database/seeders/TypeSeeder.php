<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers

use Illuminate\Support\Facades\Schema;

// Models

use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Type::truncate();
        });

        $allTypes = [
            'Web Development',
            'Game Development',
            'VLR Stats',
            'E-Commerce',
            'Blockchain',
            'Indie rpg Game',
            'Building Project',
            'First Person Shooter',
            'Game Streaming Platform',
            'Mobile App'
        ];
        
        foreach ($allTypes as $type) {
            $type = Type::create([
                'name' => $type,
                'slug' => str()->slug($type),
                'description' => fake()->sentence()
            ]);
        }
    }
}
