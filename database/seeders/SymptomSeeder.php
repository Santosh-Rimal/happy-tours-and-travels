<?php

namespace Database\Seeders;

use App\Models\AltitudeSicknes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SymptomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       AltitudeSicknes::truncate();

       // Create altitude sickness information
       AltitudeSicknes::create([
       'title' => 'Acute Mountain Sickness (AMS)',
       'mild_symptoms' => [
       'Headache',
       'Dizziness',
       'Nausea or vomiting',
       'Fatigue or weakness',
       'Difficulty sleeping'
       ],
       'severe_symptoms' => [
       'Shortness of breath at rest',
       'Coughing, possibly with bloody sputum',
       'Chest tightness or congestion',
       'Confusion or difficulty walking straight',
       'Decreased consciousness or withdrawal from social interaction'
       ],
       ]);

       AltitudeSicknes::create([
       'title' => 'High Altitude Cerebral Edema (HACE)',
       'mild_symptoms' => [
       'Severe headache unrelieved by medication',
       'Loss of coordination (ataxia)',
       'Weakness',
       'Nausea and vomiting'
       ],
       'severe_symptoms' => [
       'Hallucinations',
       'Disorientation and confusion',
       'Loss of consciousness',
       'Coma (in extreme cases)'
       ],
       ]);

       AltitudeSicknes::create([
       'title' => 'High Altitude Pulmonary Edema (HAPE)',
       'mild_symptoms' => [
       'Shortness of breath during exertion',
       'Dry cough',
       'Chest tightness',
       'Reduced exercise performance'
       ],
       'severe_symptoms' => [
       'Shortness of breath at rest',
       'Gurgling or rattling breaths',
       'Coughing up frothy or pink sputum',
       'Extreme fatigue and weakness',
       'Blue or gray lips/fingernails (cyanosis)'
       ],
       ]);
    }
}