<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'title' => 'Gather & Pray',
            'type' => 'weekly-convergence',
            'description' => 'A weekly prayer gathering designed to strengthen believers, deepen faith, and intercede for individuals, communities, and nations.',
            'meta' => [
                'eyebrow' => 'WEEKLY SERVICES',
                'hero_description' => 'Wisdom Envoys is a place where Kingdom Ambassadors are raised for Global Influence. We are committed to teaching the Word of God with simplicity and power, empowering you to live a life of victory.',
                'mandates' => [
                    ['icon' => 'person_celebrate', 'title' => 'Ambassadors', 'desc' => 'Raising individuals who represent the Kingdom of God in all spheres of life.'],
                    ['icon' => 'auto_awesome', 'title' => 'Graces', 'desc' => 'Imparting spiritual gifts and graces necessary for fulfilling your divine assignment.'],
                    ['icon' => 'key', 'title' => 'Access', 'desc' => 'Granting spiritual and practical keys to unlock closed doors of opportunity.'],
                    ['icon' => 'public', 'title' => 'Influence', 'desc' => 'Empowering saints to become voices of authority and change in their communities.'],
                    ['icon' => 'hub', 'title' => 'Dominion Hub', 'desc' => 'A central point of fellowship where dominion is activated through collective prayer.'],
                ],
                'locations' => [
                    ['name' => 'Wisdom Envoys Cameroon', 'address' => 'Christ Gentle Whisper Ministry, Mile 16, Cameroon.', 'time' => 'Sundays | 8:00 AM & 10:30 AM', 'type' => 'physical'],
                    ['name' => 'Online Community', 'address' => 'YouTube & Facebook Live Stream.', 'time' => 'Sundays | 8:00 AM (GMT+1)', 'type' => 'online'],
                ],
            ],
            'button_text' => 'JOIN US',
            'button_url' => '#',
            'status' => true,
            'display_order' => 0,
        ]);

        Service::create([
            'title' => 'The Life Community',
            'type' => 'the-life-community',
            'description' => 'A nexus for inspiration where we focus on engendering an atmosphere for building Christ-centered relationships.',
            'meta' => [
                'eyebrow' => 'THE LIFE COMMUNITY',
                'hero_description' => 'A nexus for inspiration where we focus on engendering an atmosphere for building Christ-centered relationships.',
                'about_title' => 'Building a Divine Nexus',
                'about_paragraphs' => [
                    'The Life Community is more than just a gathering; it is a prophetic ecosystem designed to foster authentic, Christ-centered connections. Under the Apostolic Mandate, we recognize that spiritual growth flourishes best within a community that mirrors the unity of the Godhead.',
                    'Our pastoral platform is dedicated to creating safe spaces for fellowship, mentorship, and the shared journey of faith. We believe that when hearts are knit together in love and purpose, the impossible becomes possible.',
                ],
                'scripture_quote' => 'And the Lord said, Behold, the people is one, and they have all one language; and this they begin to do: and now nothing will be restrained from them, which they have imagined to do.',
                'scripture_ref' => 'GENESIS 11:6',
                'cta_title' => 'Engendering Atmosphere',
                'cta_description' => 'Experience the power of unity and the beauty of Christ-centered fellowship.',
            ],
            'button_text' => 'LEARN MORE',
            'button_url' => '#',
            'status' => true,
            'display_order' => 1,
        ]);

        Service::create([
            'title' => 'Quarterly Congress',
            'type' => 'quarterly-congress',
            'description' => 'Three congresses held annually for prophetic alignment and apostolic impartation.',
            'meta' => [
                'hero_description' => 'At Wisdom Envoys there are three congresses prepared for the Elect and the Believers of Christ Jesus, each uniquely designed to foster spiritual maturity, apostolic leadership, and corporate intercession.',
                'congresses' => [
                    [
                        'name' => 'THIRST 2026',
                        'date' => 'MARCH 26TH - 29TH',
                        'short_desc' => 'The Spiritual Hunger and Intense Revival Seeking Time.',
                        'number' => '01',
                        'full_title' => 'THIRST - The Spiritual Hunger',
                        'full_desc' => 'THIRST is more than a gathering; it\'s a divine appointment for those whose souls pant after God. This congress focuses on spiritual renewal, deep intimacy with the Father, and the awakening of spiritual gifts within the believer.',
                        'features' => [
                            'Deep immersions in corporate worship and prophetic chants.',
                            'Deliverance and healing services led by the presbytery.',
                            'Impartation sessions for ministerial efficiency.',
                        ],
                    ],
                    [
                        'name' => 'ITLT 2026',
                        'date' => 'JUNE 15TH - 19TH',
                        'short_desc' => 'Intensive Theological Leadership Training.',
                        'number' => '02',
                        'full_title' => 'ITLT - Leadership Training',
                        'full_desc' => 'The Intensive Theological Leadership Training (ITLT) is designed for those called into the five-fold ministry and marketplace leadership. It provides a structured curriculum for doctrinal soundness and administrative excellence.',
                        'focus_areas' => 'Systematic Theology, Ecclesiology, Servant Leadership, and Spiritual Jurisprudence.',
                    ],
                    [
                        'name' => 'TIAG 2026',
                        'date' => 'OCTOBER 10TH - 14TH',
                        'short_desc' => 'The Intercessory Apostolic Gathering.',
                        'number' => '03',
                        'full_title' => 'TIAG - Intercessory Gathering',
                        'full_desc' => 'The Intercessory Apostolic Gathering (TIAG) is the "Engine Room" of the Mandate. It is here that regional strategies are birthed through heavy intercession and prophetic decrees over nations.',
                        'grid_items' => [
                            ['icon' => 'public', 'title' => 'Global Impact', 'desc' => 'Prayers for the continents.'],
                            ['icon' => 'shield_with_heart', 'title' => 'Preservation', 'desc' => 'Securing the remnant.'],
                        ],
                    ],
                ],
            ],
            'button_text' => 'DISCOVER',
            'button_url' => '#',
            'status' => true,
            'display_order' => 2,
        ]);

        Service::create([
            'title' => 'Marketplace Expressions',
            'type' => 'default',
            'description' => 'Campus and societal expressions designed to raise kingdom functionaries who demonstrate God\'s wisdom and influence within different sectors of society.',
            'button_text' => 'EXPLORE',
            'button_url' => '#',
            'status' => true,
            'display_order' => 3,
        ]);
    }
}
