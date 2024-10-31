<?php

namespace Database\Seeders;


use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Helpers

use Illuminate\Support\Facades\Schema;

// Models

use App\Models\Technology;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Schema::withoutForeignKeyConstraints(function () {
            Technology::truncate();
        });

        $allTechnologies = [
            'HTML',
            'CSS',
            'SCSS',
            'JAVASCRIPT',
            'VUE',
            'PHP',
            'TYPESCRIPT',
            'LARAVEL',
            'SQL'
        ];

        foreach ($allTechnologies as $singleTech) {
            Technology::create([
                'name' => $singleTech
            ]);
        }
    }
}
