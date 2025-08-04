<?php

namespace Database\Seeders;

use App\Models\RecentCsr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CrsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $csrActivities = [
        [
        'title' => 'Nepal Telecom Digital Education Initiative',
        'description' => 'Provided free internet access and digital devices to 500 rural schools across Nepal to
        facilitate online learning during and after the pandemic.',
        'image' => 'nt-digital-edu.jpg'
        ],
        [
        'title' => 'Chaudhary Group Green School Project',
        'description' => 'Established 25 eco-friendly schools with solar power, rainwater harvesting, and waste
        management systems in earthquake-affected districts.',
        'image' => 'cg-green-school.jpg'
        ],
        [
        'title' => 'Nabil Bank Vocational Training Program',
        'description' => 'Trained 1,200 underprivileged youth in marketable skills like plumbing, electrical work, and
        tailoring with 80% job placement rate.',
        'image' => 'nabil-vocational.jpg'
        ],
        [
        'title' => 'Himalayan Java COVID Relief',
        'description' => 'Distributed essential medical equipment including ventilators and PPE to 15 government
        hospitals nationwide during the pandemic.',
        'image' => 'hjava-covid-relief.jpg'
        ],
        [
        'title' => 'Surya Nepal Clean Drinking Water Project',
        'description' => 'Installed 50 water purification plants in remote communities of Province 2, benefiting over
        25,000 residents.',
        'image' => 'surya-water-project.jpg'
        ],
        [
        'title' => 'Prabhu Bank Financial Literacy Campaign',
        'description' => 'Educated 10,000 women entrepreneurs across 50 municipalities on banking, savings, and digital
        transactions.',
        'image' => 'prabhu-fin-literacy.jpg'
        ],
        [
        'title' => 'Yeti Airlines Disaster Preparedness Program',
        'description' => 'Conducted earthquake response training for 5,000 students and teachers in Kathmandu Valley
        schools.',
        'image' => 'yeti-disaster-prep.jpg'
        ],
        [
        'title' => 'Danfe Cruises Bagmati Cleanup Initiative',
        'description' => 'Organized monthly river cleanup drives removing over 20 tons of waste with employee volunteers
        and local communities.',
        'image' => 'danfe-bagmati-cleanup.jpg'
        ],
        [
        'title' => 'CG Foods Nutrition for Education',
        'description' => 'Provided daily nutritious meals to 8,000 students in Karnali province schools for improved
        attendance and performance.',
        'image' => 'cg-foods-nutrition.jpg'
        ],
        [
        'title' => 'Nepal SBI Bank Rural Fintech Adoption',
        'description' => 'Set up mobile banking kiosks in 100 remote villages and trained locals in digital financial
        services.',
        'image' => 'sbi-fintech.jpg'
        ]
        ];

        foreach ($csrActivities as $activity) {
        RecentCsr::create($activity);
        }
    }
}