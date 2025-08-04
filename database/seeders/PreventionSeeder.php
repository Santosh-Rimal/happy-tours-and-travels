<?php

namespace Database\Seeders;

use App\Models\Prevention;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PreventionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $preventions = [
        [
        'title' => 'Workplace Accident Prevention',
        'text' => 'Implement regular safety training programs, maintain clean and organized workspaces, ensure proper
        use of personal protective equipment (PPE), and conduct routine equipment inspections to prevent workplace
        accidents.'
        ],
        [
        'title' => 'Fire Prevention Measures',
        'text' => 'Install smoke detectors and fire extinguishers in accessible locations, conduct regular fire drills,
        maintain clear evacuation routes, and properly store flammable materials to prevent fire incidents.'
        ],
        [
        'title' => 'Cybersecurity Prevention',
        'text' => 'Use strong passwords and multi-factor authentication, keep software updated, educate employees about
        phishing scams, implement network security measures, and regularly back up important data to prevent cyber
        attacks.'
        ],
        [
        'title' => 'Health Infection Prevention',
        'text' => 'Promote regular hand washing, maintain clean surfaces, ensure proper ventilation, implement sick
        leave policies, and provide personal protective equipment to prevent the spread of infections in the workplace.'
        ]
        ];

        foreach ($preventions as $prevention) {
        Prevention::create($prevention);
        }
    }
}