<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsefulInformationSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('useful_information')->insert([
            [
                'trip_detail_id' => 1,
                'title' => 'Best Season',
                'description' => 'Spring and autumn are the best seasons for Everest Base Camp Trek.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 2,
                'title' => 'Permits Required',
                'description' => 'TIMS and Annapurna Conservation Area Permit are required.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 3,
                'title' => 'Cultural Etiquette',
                'description' => 'Respect local customs and dress modestly in temples.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
