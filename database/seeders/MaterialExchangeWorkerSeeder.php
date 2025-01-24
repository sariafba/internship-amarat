<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaterialExchangeWorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('material_exchange_workers')->insert([
            // Today's entries
            [
                'material_exchange_id' => 1,
                'worker_id' => 1,
                'duration' => 'day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_exchange_id' => 1,
                'worker_id' => 2,
                'duration' => 'half_day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_exchange_id' => 2,
                'worker_id' => 2,
                'duration' => 'half_day',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            [
                'material_exchange_id' => 3,
                'worker_id' => 3,
                'duration' => 'day',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'material_exchange_id' => 3,
                'worker_id' => 4,
                'duration' => 'half_day',
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Yesterday's entries
            [
                'material_exchange_id' => 5,
                'worker_id' => 1,
                'duration' => 'day',
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],
            [
                'material_exchange_id' => 5,
                'worker_id' => 2,
                'duration' => 'half_day',
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],

            [
                'material_exchange_id' => 7,
                'worker_id' => 3,
                'duration' => 'day',
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],
            [
                'material_exchange_id' => 7,
                'worker_id' => 4,
                'duration' => 'half_day',
                'created_at' => now()->subDay(1),
                'updated_at' => now()->subDay(1),
            ],

            // Day before yesterday's entries
            [
                'material_exchange_id' => 9,
                'worker_id' => 1,
                'duration' => 'day',
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],
            [
                'material_exchange_id' => 9,
                'worker_id' => 2,
                'duration' => 'half_day',
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],

            [
                'material_exchange_id' => 11,
                'worker_id' => 3,
                'duration' => 'day',
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],
            [
                'material_exchange_id' => 11,
                'worker_id' => 4,
                'duration' => 'half_day',
                'created_at' => now()->subDay(2),
                'updated_at' => now()->subDay(2),
            ],
        ]);
    }
}
