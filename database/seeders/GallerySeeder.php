<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $galleries = [
       [
       'title' => 'Mount Everest Panorama',
       'image' => 'galleries/everest-panorama.jpg',
       'caption' => 'The breathtaking view of Mount Everest from Kala Patthar, 5,643m altitude'
       ],
       [
       'title' => 'Pashupatinath Temple',
       'image' => 'galleries/pashupatinath.jpg',
       'caption' => 'The sacred Hindu temple complex on the banks of Bagmati River'
       ],
       [
       'title' => 'Pokhara Lakeside',
       'image' => 'galleries/pokhara-lakeside.jpg',
       'caption' => 'Tranquil Phewa Lake with Annapurna range in the background'
       ],
       [
       'title' => 'Bhaktapur Durbar Square',
       'image' => 'galleries/bhaktapur-square.jpg',
       'caption' => 'UNESCO World Heritage Site showcasing Newari architecture'
       ],
       [
       'title' => 'Chitwan Elephant Safari',
       'image' => 'galleries/chitwan-elephant.jpg',
       'caption' => 'Wildlife viewing in Chitwan National Park'
       ],
       [
       'title' => 'Lumbini Maya Devi Temple',
       'image' => 'galleries/lumbini-temple.jpg',
       'caption' => 'Birthplace of Lord Buddha and important pilgrimage site'
       ],
       [
       'title' => 'Annapurna Base Camp',
       'image' => 'galleries/annapurna-basecamp.jpg',
       'caption' => 'Trekker enjoying sunrise view at ABC (4,130m)'
       ],
       [
       'title' => 'Kathmandu Valley',
       'image' => 'galleries/kathmandu-valley.jpg',
       'caption' => 'Aerial view of the capital city surrounded by hills'
       ],
       [
       'title' => 'Rara Lake',
       'image' => 'galleries/rara-lake.jpg',
       'caption' => 'Nepal\'s largest lake in the remote Mugu district'
       ],
       [
       'title' => 'Tiji Festival, Mustang',
       'image' => 'galleries/tiji-festival.jpg',
       'caption' => 'Colorful annual Buddhist festival in Upper Mustang'
       ],
       [
       'title' => 'Swayambhunath Stupa',
       'image' => 'galleries/swayambhunath.jpg',
       'caption' => 'The ancient Monkey Temple overlooking Kathmandu'
       ],
       [
       'title' => 'Langtang Valley',
       'image' => 'galleries/langtang-valley.jpg',
       'caption' => 'Beautiful alpine valley north of Kathmandu'
       ]
       ];

       foreach ($galleries as $gallery) {
       Gallery::create($gallery);
       }
    }
}