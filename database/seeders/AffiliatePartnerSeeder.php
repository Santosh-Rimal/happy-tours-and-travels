<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AffiliatePartnerSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('affiliate_partners')->insert([
            [
                'name' => 'Himalayan Treks',
                'image' => null,
                'description' => 'Leading trekking agency in Nepal.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Adventure Tours',
                'image' => null,
                'description' => 'Specialists in adventure sports and tours.',
                'status' => 'active',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
