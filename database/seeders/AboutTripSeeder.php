<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AboutTripSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('about_trips')->insert([
            [
                'trip_detail_id' => 1,
                'title' => 'About Everest Base Camp Trek',
                'trip_description' => 'Experience the adventure of a lifetime trekking to the base of the world’s highest mountain.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 2,
                'title' => 'About Annapurna Circuit Trek',
                'trip_description' => 'A journey through diverse landscapes and cultures in the Annapurna region.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 3,
                'title' => 'About Kathmandu Valley Cultural Tour',
                'trip_description' => 'Discover the rich history and culture of Kathmandu Valley.',
                'image' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
