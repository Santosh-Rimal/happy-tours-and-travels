<?php

namespace Database\Seeders;

use App\Models\CulturalDoNot;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CulturaldonotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $culturalDonots = [
       [
       'title' => 'In Nepali Culture',
       'what_donot' => 'Do not touch anything with your feet as they are considered unclean. Avoid pointing with a
       single finger - use your whole hand instead. Never step over or touch someone with your feet, especially not
       elders.'
       ],
       [
       'title' => 'In Nepali Dining Etiquette',
       'what_donot' => 'Do not start eating before the eldest person at the table. Avoid wasting food as it is
       considered disrespectful. Never use your left hand to eat or pass food items.'
       ],
       [
       'title' => 'In Nepali Religious Sites',
       'what_donot' => 'Do not wear revealing clothing when visiting temples. Avoid touching religious offerings or
       items with your feet. Never point your feet at religious statues or altars.'
       ],
       [
       'title' => 'In Nepali Social Interactions',
       'what_donot' => 'Do not show public displays of affection as it\'s frowned upon. Avoid direct eye contact with
       elders as it can be seen as challenging. Never touch someone\'s head as it\'s considered sacred.'
       ],
       [
       'title' => 'In Middle Eastern Cultures',
       'what_donot' => 'Do not show the soles of your feet or shoes to others as it\'s considered offensive. Avoid using
       your left hand for eating or giving/receiving items as it\'s seen as unclean.'
       ],
       [
       'title' => 'In Japanese Culture',
       'what_donot' => 'Do not stick chopsticks upright in a bowl of rice as it resembles funeral rites. Avoid blowing
       your nose in public as it\'s considered extremely rude.'
       ],
       [
       'title' => 'In Indian Culture',
       'what_donot' => 'Do not touch someone\'s head as it\'s considered sacred. Avoid public displays of affection as
       they\'re generally frowned upon.'
       ],
       [
       'title' => 'In Thai Culture',
       'what_donot' => 'Do not touch or point at people with your feet as they\'re considered the lowest and dirtiest
       part of the body. Avoid criticizing the monarchy as it\'s illegal.'
       ],
       [
       'title' => 'In Russian Culture',
       'what_donot' => 'Do not give even-numbered flowers as they\'re for funerals. Avoid shaking hands or passing items
       over a threshold as it\'s considered bad luck.'
       ]
       ];

       // Sort alphabetically by title
       usort($culturalDonots, function($a, $b) {
       return strcmp($a['title'], $b['title']);
       });

       foreach ($culturalDonots as $donot) {
       CulturalDoNot::create($donot);
       }
    }
}