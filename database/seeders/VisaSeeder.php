<?php

namespace Database\Seeders;

use App\Models\Visa;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class VisaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       Visa::truncate();

       // Create visa information
       Visa::create([
       'title' => 'Visa on Arrival',
       'description' => "Most travelers can obtain a visa upon arrival at Tribhuvan International Airport or land border
       crossings.\n\n- 15 days - \$30 USD\n- 30 days - \$50 USD\n- 90 days - \$125 USD",
       'requirements' => [
       'Passport valid for at least 6 months',
       'One passport-size photo',
       'Completed arrival form',
       'Proof of onward travel'
       ],
       ]);

    }
}