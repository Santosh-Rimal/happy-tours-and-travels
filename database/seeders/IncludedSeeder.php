<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncludedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('includeds')->insert([
        [
        'trip_detail_id' => 1,
        'includes' => json_encode(['International airfare', 'Personal expenses']),
        'created_at' => now(),
        'updated_at' => now(),
        ],
        [
        'trip_detail_id' => 2,
        'includes' => json_encode(['Travel insurance', 'Tips']),
        'created_at' => now(),
        'updated_at' => now(),
        ],
        [
        'trip_detail_id' => 3,
        'includes' => json_encode(['Lunch and dinner', 'Entry fees']),
        'created_at' => now(),
        'updated_at' => now(),
        ],
        ]);
    }
}