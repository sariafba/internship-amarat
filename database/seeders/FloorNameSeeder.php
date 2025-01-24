<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FloorNameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('floor_names')->insert([
            ['name' => 'الأول'],
            ['name' => 'الثاني'],
            ['name' => 'الثالث'],
            ['name' => 'الرابع'],
            ['name' => 'الخامس'],
//            ['name' => 'السادس'],
//            ['name' => 'السابع'],
//            ['name' => 'الثامن'],
//            ['name' => 'التاسع'],
//            ['name' => 'العاشر'],
        ]);

    }
}
