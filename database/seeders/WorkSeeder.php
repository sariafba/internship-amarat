<?php

namespace Database\Seeders;

use App\Models\Floor;
use App\Models\WorkType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class WorkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach(Floor::all() as $floor)
            foreach (WorkType::all() as $workType)
            DB::table('works')->insert([
                [
                    'floor_id' => $floor->id,
                    'work_type_id' => $workType->id,
                ],
            ]);
    }
}
