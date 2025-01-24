<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('workers')->insert([
            [
                'name' => 'احمد 1',
            ],
            [
                'name' => 'احمد 2',
            ],
            [
                'name' => 'احمد 3',
            ],
            [
                'name' => 'احمد 4',
            ],
            [
                'name' => 'احمد 5',
            ]
        ]);
    }
}
