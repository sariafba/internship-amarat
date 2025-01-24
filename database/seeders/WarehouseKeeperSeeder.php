<?php

namespace Database\Seeders;

use App\Models\WarehouseKeeper;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WarehouseKeeperSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WarehouseKeeper::query()->create([
            'name' => 'warehouse keeper 1',
            'username' => 'warehouse_keeper_1',
            'password' => 'password'
        ]);
    }
}
