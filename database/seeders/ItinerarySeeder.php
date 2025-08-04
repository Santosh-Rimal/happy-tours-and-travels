<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItinerarySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('itineraries')->insert([
            [
                'trip_detail_id' => 1,
                'title' => 'Day 1: Arrival in Kathmandu',
                'description' => 'Arrive in Kathmandu and transfer to hotel.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 1,
                'title' => 'Day 2: Fly to Lukla, Trek to Phakding',
                'description' => 'Scenic flight to Lukla and trek to Phakding village.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 2,
                'title' => 'Day 1: Drive to Besisahar',
                'description' => 'Start the Annapurna Circuit with a drive to Besisahar.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 3,
                'title' => 'Day 1: Kathmandu Sightseeing',
                'description' => 'Visit Swayambhunath, Pashupatinath, and Boudhanath.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
