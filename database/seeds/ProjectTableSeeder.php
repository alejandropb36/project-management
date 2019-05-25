<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = factory(App\Project::class, 5)
            ->create()
            ->each(function ($project) {
                $project->users()->save(factory(App\User::class)->make(), ['user_role' => 'Lider']);
        });

    }
}
