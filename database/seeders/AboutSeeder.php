<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       About::truncate();

       $sections = [
       [
       'section_type' => 'content',
       'section_title' => 'Our Journey',
       'section_content' => 'Founded in Kathmandu with a passion for showcasing Nepal\'s breathtaking beauty, Hamro
       Tours and Travel has grown from a small local operator to a premier travel company offering curated experiences
       across the Himalayas, cultural tours, jungle safaris, and adventure trips throughout Nepal.',
       'order' => 1
       ],
       [
       'section_type' => 'content',
       'section_title' => 'Our Promise',
       'section_content' => 'Authentic experiences, responsible tourism, and personalized service that goes beyond
       expectations.',
       'order' => 2
       ],
       [
       'section_type' => 'content',
       'section_title' => 'Local Expertise',
       'section_content' => 'Our team of native guides and travel specialists have intimate knowledge of Nepal\'s hidden
       gems.',
       'order' => 3
       ],
       [
       'section_type' => 'stats',
       'stat_value' => '15+',
       'stat_label' => 'Years Experience',
       'order' => 4
       ],
       [
       'section_type' => 'stats',
       'stat_value' => '500+',
       'stat_label' => 'Happy Travelers',
       'order' => 5
       ],
       [
       'section_type' => 'stats',
       'stat_value' => '50+',
       'stat_label' => 'Tour Packages',
       'order' => 6
       ]
       ];

       About::create([
       'page_title' => 'About Hamro Tours and Travel',
       'page_subtitle' => 'Your trusted partner in creating unforgettable travel experiences across Nepal and beyond',
       'sections' => $sections,
       ]);
    }
}