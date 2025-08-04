<?php

namespace Database\Seeders;

use App\Models\Season;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeasonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Season::truncate();

        // Peak Seasons
        Season::create([
        'category' => 'peak_seasons',
        'name' => 'Autumn',
        'months' => 'Sep-Nov',
        'description' => 'Clear skies, moderate temperatures, best for trekking with spectacular mountain views.',
        ]);

        Season::create([
        'category' => 'peak_seasons',
        'name' => 'Spring',
        'months' => 'Mar-May',
        'description' => 'Blooming rhododendrons, warm days, excellent for wildlife viewing in national parks.',
        ]);

        // Other Seasons
        Season::create([
        'category' => 'other_seasons',
        'name' => 'Winter',
        'months' => 'Dec-Feb',
        'description' => 'Cold at high altitudes but great for cultural tours in Kathmandu and Pokhara.',
        ]);

        Season::create([
        'category' => 'other_seasons',
        'name' => 'Monsoon',
        'months' => 'Jun-Aug',
        'description' => 'Lush landscapes, fewer crowds, ideal for Upper Mustang and Dolpo regions.',
        ]);
    }
}