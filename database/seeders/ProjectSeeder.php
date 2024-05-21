<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i=0; $i < 5; $i++) {
            $project = new Project();

            $project->title = $faker->sentence(3);
            $project->slug = Str::of($project->title)->slug('-');
            $project->thumb = $faker->imageUrl(360, 360, 'Image of project', true, "{{$project->name}}", true, 'jpg');
            $project->project_link = $faker->url();
            $project->repo_link = $faker->url();
            $project->description = $faker->paragraph();

            $project->save();
        }
    }
}
