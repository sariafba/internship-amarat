<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PatternSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Project::all() as $project)
        {
            DB::table('patterns')->insert([
               [
                   'project_id' => $project->id,
                   'name' => 'النموذج 1'
               ],
                [
                    'project_id' => $project->id,
                    'name' => 'النموذج 2'
                ]
            ]);
        }
    }
}
