<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        DB::table('categories')->insert([
            ['name' => 'Trekking', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Cultural Tour', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Adventure Sports', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
