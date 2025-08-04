<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CorporateResponsibility;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CorporateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $responsibilities = [
       [
       'title' => 'Environmental Sustainability',
       'description' => 'Implement eco-friendly practices like waste reduction, energy efficiency, and sustainable
       sourcing. In Nepal, this includes proper disposal of trekking waste, supporting reforestation projects, and
       reducing plastic use in operations.'
       ],
       [
       'title' => 'Community Development',
       'description' => 'Support local communities through education programs, infrastructure development, and job
       creation. Nepali companies often focus on earthquake-resistant rebuilding, school sponsorships, and rural
       healthcare initiatives.'
       ],
       [
       'title' => 'Ethical Labor Practices',
       'description' => 'Ensure fair wages, safe working conditions, and no child labor. In Nepal, this is particularly
       important in industries like carpet weaving, trekking, and garment manufacturing where exploitation risks exist.'
       ],
       [
       'title' => 'Cultural Preservation',
       'description' => 'Support and preserve local traditions and heritage. Many Nepali corporations sponsor festivals,
       maintain historical sites, and promote traditional crafts to preserve cultural identity.'
       ],
       [
       'title' => 'Disaster Response',
       'description' => 'Have plans and resources to assist during natural disasters. Given Nepal\'s vulnerability to
       earthquakes and floods, companies often maintain emergency funds and response teams.'
       ],
       [
       'title' => 'Employee Volunteering',
       'description' => 'Encourage staff to participate in social causes. Popular Nepali initiatives include teaching in
       rural schools, organizing health camps, and environmental cleanups.'
       ],
       [
       'title' => 'Transparent Governance',
       'description' => 'Maintain ethical business practices and anti-corruption measures. This is crucial in Nepal
       where transparency can help improve the overall business climate.'
       ],
       [
       'title' => 'Women Empowerment',
       'description' => 'Promote gender equality in the workplace and supply chain. Nepali companies often focus on
       vocational training for women and supporting female entrepreneurs.'
       ],
       [
       'title' => 'Sustainable Tourism',
       'description' => 'For travel-related businesses, practice responsible tourism that benefits local communities.
       This includes fair wages for guides, cultural sensitivity training, and environmental protection measures.'
       ],
       [
       'title' => 'Education Support',
       'description' => 'Invest in educational initiatives, especially in rural areas. Many Nepali corporations adopt
       schools, provide scholarships, or fund teacher training programs.'
       ]
       ];

       foreach ($responsibilities as $responsibility) {
       CorporateResponsibility::create($responsibility);
       }

    }
}