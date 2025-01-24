<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerHourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('worker_hours')->insert([
            [
                'worker_id' => 1,
                'date' => today(),
            ],
            [
                'worker_id' => 2,
                'date' => today(),
            ],
            [
                'worker_id' => 3,
                'date' => today(),
            ],
            [
                'worker_id' => 4,
                'date' => today(),
            ],
            [
                'worker_id' => 5,
                'date' => today(),
            ],
        ]);
    }
}
