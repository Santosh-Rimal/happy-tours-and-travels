<?php

namespace Database\Seeders;

use App\Models\TrekkingPackage;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TrekkingPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TrekkingPackage::truncate();

        // Create sample trekking packages
        TrekkingPackage::create([
        'title' => 'Everest Base Camp Trek',
        'requirements' => [
        'Good physical fitness level',
        'Valid passport and necessary permits',
        'Proper trekking gear and clothing',
        'Travel insurance with mountain rescue coverage'
        ],
        'tips' => [
        'Acclimatize properly to avoid altitude sickness',
        'Pack light but include essential warm layers',
        'Stay hydrated throughout the trek',
        'Start training several weeks before your trip'
        ],
        ]);

        TrekkingPackage::create([
        'title' => 'Annapurna Circuit Trek',
        'requirements' =>[
        'Moderate level of fitness',
        'TIMS card and ACAP permit',
        'Sturdy broken-in hiking boots',
        'Water purification tablets or filter'
        ],
        'tips' =>[
        'The Thorong La pass is best crossed early morning',
        'Carry small bills for tea houses and small purchases',
        'Enjoy the diverse landscapes from rice fields to high desert',
        'Consider adding Tilicho Lake side trip if time allows'
        ],
        ]);

    }
}