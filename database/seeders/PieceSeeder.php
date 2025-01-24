<?php

namespace Database\Seeders;

use App\Models\Pattern;
use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PieceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Pattern::all() as $pattern)
        {
            DB::table('pieces')->insert([
                [
                    'pattern_id' => $pattern->id,
                    'name' => 'القطعة 1'
                ],
                [
                    'pattern_id' => $pattern->id,
                    'name' => 'القطعة 2'
                ]
            ]);
        }

    }
}
