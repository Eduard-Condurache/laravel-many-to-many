<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers

use Illuminate\Support\Facades\Schema;

// Models

use App\Models\Project;
use App\Models\Type;
use App\Models\Technology;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::withoutForeignKeyConstraints(function () {
            Project::truncate();
        });
        for ($i=0; $i < 10; $i++) {
            
            $randomType = Type::inRandomOrder()->first();

            $project = Project::create([
                'title' => fake()->company(),
                'description' => fake()->sentence(5),
                'category' => fake()->word(2, true),
                'type_id' => $randomType->id

            ]);

            $technologyIds = [];

            for ($j = 0; $j < rand(0, Technology::count()); $j++) {

                $randomTecnology = Technology::inRandomOrder()->first();

                if (!in_array($randomTecnology->id, $technologyIds)) {
                    $technologyIds[] = $randomTecnology->id;
                }
            }

            $project->technologies()->sync($technologyIds);

        }
    }
}
