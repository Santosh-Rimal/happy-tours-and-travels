<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NotIncludedSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('not_includeds')->insert([
            [
                'trip_detail_id' => 1,
                'notincludes' => json_encode(['International airfare', 'Personal expenses']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 2,
                'notincludes' => json_encode(['Travel insurance', 'Tips']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'trip_detail_id' => 3,
                'notincludes' => json_encode(['Lunch and dinner', 'Entry fees']),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
