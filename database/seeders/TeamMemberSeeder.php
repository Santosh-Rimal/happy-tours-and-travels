<?php

namespace Database\Seeders;

use App\Models\TeamMember;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamMemberSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Team Members
       TeamMember::insert([
       [
       'name' => 'Rajesh Thapa',
       'position' => 'Senior Trekking Guide',
       'description' => '15 years experience leading Everest Base Camp treks',
       'image_url' => 'https://images.unsplash.com/photo-1545167622-3a6ac756afa4',
       'order' => 1
       ],
       [
       'name' => 'Anita Gurung',
       'position' => 'Cultural Tour Specialist',
       'description' => 'Expert in Nepal\'s heritage sites and traditions',
       'image_url' => 'https://images.unsplash.com/photo-1554727242-741c14fa561c',
       'order' => 2
       ],
       [
       'name' => 'Bikram Rai',
       'position' => 'Adventure Sports Director',
       'description' => 'Certified in rafting, paragliding, and mountain biking',
       'image_url' => 'https://images.unsplash.com/photo-1568602471122-7832951cc4c5',
       'order' => 3
       ]
       ]);
    }
}