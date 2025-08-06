<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Visa;
use App\Models\Prevention;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CustomizeTrip;
use Illuminate\Database\Seeder;
use App\Models\Backend\TripDetail;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();


        User::updateOrCreate([
            'email' => 'admin@example.com',
        ], [
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // 🔒 use a secure password
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        $this->call([
            CategorySeeder::class,
            TripDetailSeeder::class,
            HighlightSeeder::class,
            AboutTripSeeder::class,
            ItinerarySeeder::class,
            IncludedSeeder::class,
            NotIncludedSeeder::class,
            UsefulInformationSeeder::class,
            AffiliatePartnerSeeder::class,
            ContactSeeder::class,
            HeroSectionSeeder::class,
            AboutSeeder::class,
            FeatureSeeder::class,
            TeamMemberSeeder::class,
            VisaSeeder::class,
            TrekkingPackageSeeder::class,
            SymptomSeeder::class,
            SeasonSeeder::class,
            SaftySeeder::class,
            PreventionSeeder::class,
            CulturaldonotSeeder::class,
            CulturaldoSeeder::class,
            CorporateSeeder::class,
            CrsSeeder::class,
            BlogSeeder::class,
            GallerySeeder::class,
        ]);

    //     if (TripDetail::count() === 0) {
    //     TripDetail::factory()->count(3)->create(); // Optional: if factory exists
    //     }

    //     $tripIds = TripDetail::pluck('id')->toArray();

    //     // Create 5 sample customize trips
    //     foreach (range(1, 5) as $index) {
    //     CustomizeTrip::create([
    //     'name' => fake()->name(),
    //     'email' => fake()->unique()->safeEmail(),
    //     'phone' => fake()->phoneNumber(),
    //     'country' => fake()->country(),
    //     'trip_id' => fake()->randomElement($tripIds),
    //     'group_size' => fake()->numberBetween(2, 10),
    //     'preferred_start_date' => fake()->date(),
    //     'duration' => fake()->numberBetween(5, 15),
    //     'budget' => '$' . fake()->numberBetween(500, 3000),
    //     'message' => fake()->sentence(12),
    //     ]);
    // }
    
}
}