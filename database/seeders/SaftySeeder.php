<?php

namespace Database\Seeders;

use App\Models\Safty;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaftySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $safties = [
         [
         'title' => 'General Safety Guidelines',
         'requirements' => [
         'Wear appropriate PPE at all times',
         'Report any hazards immediately',
         'Follow all posted safety signs',
         'Attend all required safety training'
         ]
         ],
         [
         'title' => 'Fire Safety',
         'requirements' => [
         'Know the location of fire exits',
         'Do not block fire extinguishers',
         'Participate in fire drills',
         'Report any electrical hazards'
         ]
         ],
         [
         'title' => 'Chemical Handling',
         'requirements' => [
         'Always read MSDS before use',
         'Use proper ventilation',
         'Wear chemical-resistant gloves',
         'Store chemicals in designated areas'
         ]
         ]
         ];

         foreach ($safties as $safty) {
         Safty::create($safty);
         }
    }
}