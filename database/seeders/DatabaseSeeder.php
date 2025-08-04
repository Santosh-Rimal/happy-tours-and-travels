<?php

namespace Database\Seeders;

use App\Models\Prevention;
use App\Models\User;
use App\Models\Visa;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
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
    }
}