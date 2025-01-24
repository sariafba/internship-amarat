<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            SupervisorSeeder::class,
            WarehouseKeeperSeeder::class,
            ProjectSeeder::class,
            PatternSeeder::class,
            PieceSeeder::class,
            ConstructionSeeder::class,
            FloorNameSeeder::class,
            FloorSeeder::class,
            WorkTypeSeeder::class,
            WorkSeeder::class,
            WorkerSeeder::class,
            WorkerHourSeeder::class,
            MaterialExchangeSeeder::class,
            MaterialExchangeWorkerSeeder::class
        ]);
    }
}
