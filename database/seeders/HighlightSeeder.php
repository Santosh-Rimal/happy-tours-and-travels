<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HighlightSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('highlights')->insert([
            [
                'trip_detail_id' => 1,
                'highlights' => json_encode(['Stunning views of Everest', 'Sherpa culture', 'Sagarmatha National Park']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 2,
                'highlights' => json_encode(['Thorong La Pass', 'Diverse landscapes', 'Traditional villages']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 3,
                'highlights' => json_encode(['UNESCO World Heritage Sites', 'Newari culture', 'Ancient temples']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
