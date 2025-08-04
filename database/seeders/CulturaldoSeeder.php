<?php

namespace Database\Seeders;

use App\Models\CulturalDo;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CulturaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $culturalDos = [
        [
        'title' => 'Greeting Etiquette in Nepal',
        'what_do' => 'Do greet with "Namaste" (palms pressed together near chest with a slight bow). When greeting
        elders, slightly bow your head as a sign of respect. Use honorifics like "dai" (elder brother) or "didi" (elder
        sister) when addressing people older than you.'
        ],
        [
        'title' => 'Dining Customs in Nepal',
        'what_do' => 'Do wash your hands before eating. Wait for the host to invite you to start eating. Eat with your
        right hand only. Compliment the food as it pleases the host. Offer to help with cleaning after meals.'
        ],
        [
        'title' => 'Temple Visits in Nepal',
        'what_do' => 'Do remove your shoes before entering temples. Dress modestly with covered shoulders and legs. Walk
        clockwise around stupas and religious monuments. Make offerings with your right hand. Maintain a quiet and
        respectful demeanor.'
        ],
        [
        'title' => 'Gift Giving in Nepal',
        'what_do' => 'Do give and receive gifts with both hands. Present gifts in colorful wrapping if possible. Offer
        sweets or fruits when visiting someone\'s home. Give donations with your right hand when at religious sites.
        Reciprocate hospitality when possible.'
        ],
        [
        'title' => 'Home Visits in Nepal',
        'what_do' => 'Do remove your shoes before entering a Nepali home. Accept tea or snacks when offered. Sit
        properly without pointing your feet at people. Compliment the home and family. Bring a small gift for the host
        if invited for a meal.'
        ],
        [
        'title' => 'Communication Style in Nepal',
        'what_do' => 'Do speak softly and politely. Use indirect communication to avoid confrontation. Be patient in
        conversations and business dealings. Smile often as it eases social interactions. Listen attentively when elders
        are speaking.'
        ],
        [
        'title' => 'Festival Participation in Nepal',
        'what_do' => 'Do participate respectfully in festivals. Wear traditional clothes if appropriate. Accept tika
        (vermilion powder) and blessings during festivals. Follow local customs during specific festivals. Share food
        and joy with others during celebrations.'
        ],
        [
        'title' => 'Respecting Elders in Nepal',
        'what_do' => 'Do stand up when elders enter the room. Offer your seat to elders if needed. Touch elders\' feet
        during major festivals for blessings. Serve elders first during meals. Use respectful language when addressing
        them.'
        ],
        [
        'title' => 'Business Etiquette in Nepal',
        'what_do' => 'Do begin meetings with small talk. Exchange business cards with both hands. Dress formally for
        business meetings. Be patient with decision-making processes. Maintain respectful relationships beyond just
        business.'
        ],
        [
        'title' => 'Public Behavior in Nepal',
        'what_do' => 'Do dress modestly in public spaces. Behave calmly and avoid loud arguments. Respect queues and
        wait your turn. Help others when you can. Show particular respect to monks, sadhus, and religious figures.'
        ]
        ];

        foreach ($culturalDos as $culturalDo) {
        CulturalDo::create($culturalDo);
        }

    }
}