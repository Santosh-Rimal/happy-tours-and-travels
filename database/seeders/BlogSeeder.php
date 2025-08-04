<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $blogs = [
        [
        'title' => 'Exploring Nepal\'s Hidden Trekking Gems',
        'content' => 'While Everest and Annapurna get most attention, Nepal offers incredible lesser-known treks like
        the Kanchenjunga Circuit, Lower Dolpo, and Nar Phu Valley. These routes offer pristine landscapes and authentic
        cultural experiences without the crowds. We explore what makes these hidden trails special and how to prepare
        for them.',
        'image' => 'blogs/hidden-treks.jpg',
        'slug' => Str::slug('Exploring Nepal\'s Hidden Trekking Gems')
        ],
        [
        'title' => 'Sustainable Tourism Practices in Nepal',
        'content' => 'With increasing visitors, sustainable tourism is crucial for Nepal. This post covers responsible
        trekking practices, community-based tourism initiatives, and how travelers can minimize their environmental
        impact while maximizing benefits to local communities. Learn about homestays, waste management programs, and
        ethical wildlife encounters.',
        'image' => 'blogs/sustainable-tourism.jpg',
        'slug' => Str::slug('Sustainable Tourism Practices in Nepal')
        ],
        [
        'title' => 'Nepali Cuisine: Beyond Momos and Dal Bhat',
        'content' => 'Discover the rich diversity of Nepali cuisine across different regions. From Newari bhoj to
        Thakali thali, and lesser-known dishes like gundruk ko jhol and yomari. We explore traditional cooking methods,
        festival foods, and where to find authentic culinary experiences in Kathmandu and beyond.',
        'image' => 'blogs/nepali-cuisine.jpg',
        'slug' => Str::slug('Nepali Cuisine: Beyond Momos and Dal Bhat')
        ],
        [
        'title' => 'Preserving Nepal\'s Cultural Heritage',
        'content' => 'Nepal\'s ancient temples, monuments, and traditions face challenges from urbanization and natural
        disasters. This article highlights conservation efforts, UNESCO World Heritage sites, and how visitors can
        appreciate cultural sites responsibly. Includes updates on post-earthquake reconstruction of historical
        landmarks.',
        'image' => 'blogs/cultural-heritage.jpg',
        'slug' => Str::slug('Preserving Nepal\'s Cultural Heritage')
        ],
        [
        'title' => 'Digital Transformation in Rural Nepal',
        'content' => 'How technology is reaching remote Himalayan communities. Features stories of telemedicine,
        e-learning in mountain schools, digital banking in villages, and the challenges of bringing connectivity to
        Nepal\'s most isolated regions. Includes interviews with social entrepreneurs driving this change.',
        'image' => 'blogs/digital-nepal.jpg',
        'slug' => Str::slug('Digital Transformation in Rural Nepal')
        ],
        [
        'title' => 'Wildlife Conservation Success Stories',
        'content' => 'Celebrating Nepal\'s achievements in protecting endangered species like tigers, rhinos, and red
        pandas. Learn about anti-poaching efforts, community conservation programs, and responsible wildlife tourism
        opportunities in Chitwan, Bardia, and other national parks.',
        'image' => 'blogs/wildlife-conservation.jpg',
        'slug' => Str::slug('Wildlife Conservation Success Stories')
        ],
        [
        'title' => 'Nepal\'s Emerging Adventure Sports Scene',
        'content' => 'Beyond trekking, Nepal is becoming a hub for paragliding, mountain biking, whitewater rafting, and
        even mountain marathons. This guide covers the best locations, seasons, and operators for adrenaline activities,
        with safety tips for high-altitude adventures.',
        'image' => 'blogs/adventure-sports.jpg',
        'slug' => Str::slug('Nepal\'s Emerging Adventure Sports Scene')
        ],
        [
        'title' => 'Living Traditions: Nepal\'s Festival Calendar',
        'content' => 'A month-by-month guide to Nepal\'s vibrant festivals, from Dashain and Tihar to lesser-known local
        celebrations. Learn about the cultural significance, rituals, and best places to experience these colorful
        events authentically while respecting local customs.',
        'image' => 'blogs/festivals.jpg',
        'slug' => Str::slug('Living Traditions: Nepal\'s Festival Calendar')
        ]
        ];

        foreach ($blogs as $blog) {
        Blog::create($blog);
        }
    }
}