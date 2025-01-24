<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialExchangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('material_exchanges')->insert([
            // Today's entries
            [
                'supervisor_id' => 1,
                'work_id' => rand(1, 320),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supervisor_id' => 1,
                'work_id' => rand(1, 320),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'supervisor_id' => 2,
                'work_id' => rand(1, 320),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'supervisor_id' => 2,
                'work_id' => rand(1, 320),
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Yesterday's entries
            [
                'supervisor_id' => 1,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],
            [
                'supervisor_id' => 1,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],

            [
                'supervisor_id' => 2,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],
            [
                'supervisor_id' => 2,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],

            // Day before yesterday's entries
            [
                'supervisor_id' => 1,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],
            [
                'supervisor_id' => 1,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],

            [
                'supervisor_id' => 2,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],
            [
                'supervisor_id' => 2,
                'work_id' => rand(1, 320),
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],
        ]);
    }
}
