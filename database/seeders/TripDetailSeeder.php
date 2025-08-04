<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Backend\TripDetail;

class TripDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TripDetail::insert([
            [
                'category_id' => 1,
                'trip_name' => 'Everest Base Camp Trek',
                'trip_slug' => 'everest-base-camp-trek',
                'destination' => 'Everest Region',
                'trip_style' => 'Trekking',
                'food' => 'Breakfast, Lunch, Dinner',
                'transportation' => 'Flight, Private Vehicle',
                'accommodation' => 'Teahouse, Hotel',
                'group_size' => '2-12',
                'trip_duration' => '14 Days',
                'trip_difficulty' => 'Challenging',
                'trip_price' => '1500',
                'max_elevation' => '5,364m',
                'trip_description' => 'A classic trek to the base of the world’s highest mountain, offering stunning Himalayan views and Sherpa culture.',
                'sliderimage' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'trip_name' => 'Annapurna Circuit Trek',
                'trip_slug' => 'annapurna-circuit-trek',
                'destination' => 'Annapurna Region',
                'trip_style' => 'Trekking',
                'food' => 'Breakfast, Lunch, Dinner',
                'transportation' => 'Bus, Jeep',
                'accommodation' => 'Teahouse, Lodge',
                'group_size' => '2-15',
                'trip_duration' => '18 Days',
                'trip_difficulty' => 'Moderate',
                'trip_price' => '1300',
                'max_elevation' => '5,416m',
                'trip_description' => 'A diverse trek through lush valleys, arid high mountain landscapes, and traditional villages.',
                'sliderimage' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => 1,
                'trip_name' => 'Kathmandu Valley Cultural Tour',
                'trip_slug' => 'kathmandu-valley-cultural-tour',
                'destination' => 'Kathmandu Valley',
                'trip_style' => 'Cultural Tour',
                'food' => 'Breakfast',
                'transportation' => 'Private Vehicle',
                'accommodation' => 'Hotel',
                'group_size' => '2-20',
                'trip_duration' => '4 Days',
                'trip_difficulty' => 'Easy',
                'trip_price' => '400',
                'max_elevation' => '1,400m',
                'trip_description' => 'Explore UNESCO World Heritage Sites and experience the vibrant culture of Kathmandu Valley.',
                'sliderimage' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
