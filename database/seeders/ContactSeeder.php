<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('contacts')->insert([
            [
                'name' => 'John Doe',
                'email' => 'john@example.com',
                'phone' => '9800000001',
                'message' => 'I would like to know more about the Everest trek.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'jane@example.com',
                'phone' => '9800000002',
                'message' => 'Can you arrange a cultural tour in Kathmandu?',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
