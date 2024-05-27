<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $technologies = ['HTML', 'CSS', 'PHP', 'C#', 'Vue.js', 'JavaScript', 'Laravel', 'Vite', 'AI', 'Machine Learning', 'Game', 'Unity'];

        foreach ($technologies as $technology) {
            $newTechnology = new Technology();
            $newTechnology->name = $technology;
            $newTechnology->slug = Str::slug($newTechnology->name, '-', 'en', ['#' => 'sharp']);
            $newTechnology->save();
        }
    }
}
