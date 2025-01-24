<?php

namespace Database\Seeders;

use App\Models\Piece;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConstructionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (Piece::all() as $piece)
        {
            DB::table('constructions')->insert([
                [
                    'piece_id' => $piece->id,
                    'name' => 'البناء 1'
                ],
                [
                    'piece_id' => $piece->id,
                    'name' => 'البناء 2'
                ]
            ]);
        }
    }
}
