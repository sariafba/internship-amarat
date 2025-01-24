<?php

namespace Database\Seeders;

use App\Models\Supervisor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupervisorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('supervisors')->insert([
            [
                'name' => 'supervisor 1',
                'username' => 'supervisor_1',
                'password' => bcrypt('password')
            ],
            [
                'name' => 'supervisor 2',
                'username' => 'supervisor_2',
                'password' => bcrypt('password')
            ]
        ]);
    }
}
