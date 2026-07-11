<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HomepageSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\HomepageSetting::truncate();
        
        \App\Models\HomepageSetting::create([
            'hero_badge_text' => '2026 PROFESSIONAL EDITION',
            'hero_title' => 'The Ultimate Guide to <br />',
            'hero_highlight' => 'Mexico',
            'hero_description' => 'Helping You Build Your Future in Mexico',
            'hero_bullets' => [
                '🏡 Relocation & Retirement',
                '🛂 Residency & Immigration',
                '🏠 Real Estate & Housing',
                '🏦 Banking & Financial Integration',
                '🏥 Healthcare & Insurance',
                '🏢 Business Formation & Investment',
                '🤝 Trusted Professional Network'
            ],
            'hero_button_text' => 'Ultimate PVCMX Handbook',
            'hero_coffee_url' => 'https://buymeacoffee.com/pvcmx',
            
            'video_section_label' => 'Welcome',
            'video_section_title' => 'A Message from Klaus',
            'video_section_description' => 'Discover how we can help you navigate your journey to Mexico.',
            'video_embed_url' => 'https://www.youtube.com/embed/IS1ekHmWGhI',
            
            'social_facebook_url' => 'https://www.facebook.com/PVCMX/',
            'social_instagram_url' => '#',
            'social_twitter_url' => '#',
            'social_linkedin_url' => '#',
            
            'about_section_label' => 'WHY THIS HANDBOOK',
            'about_section_title' => 'Practical Guidance from Real Experience',
            'about_section_description' => 'A clear and honest introduction to relocating to Puerto Vallarta and other regions in Mexico. Created by someone who has experienced international relocation firsthand.',
            
            'about_points' => [
                [
                    'icon' => 'fa-globe',
                    'title' => 'Firsthand Perspective',
                    'desc' => 'Klaus has lived and worked in Germany, Italy, Chile, the United States, and Mexico. His international experience brings a practical understanding of the questions, uncertainties, and important decisions involved in making another country your home.'
                ],
                [
                    'icon' => 'fa-bullseye',
                    'title' => 'Clear, Practical Information',
                    'desc' => 'From residency and housing to healthcare, banking, transportation, and starting a business, the handbook explains the most important topics in straightforward language—without unnecessary complications.'
                ],
                [
                    'icon' => 'fa-map-location-dot',
                    'title' => 'A Roadmap for Your Next Steps',
                    'desc' => 'The handbook helps you understand what to consider, what to prepare, and where professional assistance may be needed, so you can approach your move with greater confidence and fewer surprises.'
                ]
            ],
            
            'author_section_label' => 'About the Founder',
            'author_section_title' => 'Klaus Sichelschmidt',
            'author_section_desc_1' => 'Klaus has lived and worked in Germany, Italy, Chile, the United States, and Mexico, building more than four decades of international business and personal experience. His work has also taken him to China and other parts of the world, giving him a broad understanding of different cultures, systems, and ways of life.',
            'author_section_desc_2' => 'He first visited Puerto Vallarta in 1999 and later chose the region as his home. Through his own experience of living, working, relocating, and building businesses internationally, Klaus understands the practical questions and uncertainties that come with starting a new chapter in another country.',
            'author_section_desc_3' => 'This handbook was created to share that experience in a clear and honest way—helping readers better understand life, retirement, relocation, and business opportunities in Puerto Vallarta and the surrounding region.',
            'author_quote' => 'Moving to another country is more than changing your address. It is about understanding the culture, the systems, and the realities of everyday life. This handbook was created to help you begin that journey with greater clarity and confidence.',
            
            'footer_copyright_text' => '© 2026 PVCMX · All rights reserved',
            'footer_description' => 'PVCMX Puerto Vallarta Consultants of Mexico · Your trusted partner for relocation, retirement, and doing business in Mexico.'
        ]);
    }
}
