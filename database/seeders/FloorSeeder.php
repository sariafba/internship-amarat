<?php

namespace Database\Seeders;

use App\Models\Construction;
use App\Models\FloorName;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Construction::all() as $construction)
            foreach (FloorName::all() as $floorName)
                DB::table('floors')->insert([
                    [
                        'construction_id' => $construction->id,
                        'floor_name_id' => $floorName->id,
                    ]
                ]);

    }
}
