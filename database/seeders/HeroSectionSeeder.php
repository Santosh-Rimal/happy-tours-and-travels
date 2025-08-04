<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HeroSectionSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('herosections')->insert([
            [
                'heroimage' => null,
                'herotitle' => 'Explore the Himalayas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'heroimage' => null,
                'herotitle' => 'Adventure Awaits',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
