<?php

namespace Database\Seeders;

use App\Models\Message;
use App\Models\MessageYear;
use App\Models\MessageCategory;
use App\Models\Series;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class MessageSeeder extends Seeder
{
    public function run(): void
    {
        $speakers = [
            'Sir Jervis Teh',
            'Oluwatobiloba Oshunbiyi',
            'Pastor Dele Osunmakinde',
        ];

        $yearRecords = MessageYear::all()->keyBy('year');
        $categories = MessageCategory::all();
        $seriesList = Series::all();

        $messages = [
            ['year' => 2025, 'title' => 'This Is Our Day — The Apostolic Declaration', 'speaker' => 'Sir Jervis Teh', 'series' => 'This Is Our Day — TIAG 2025', 'category' => 'Teaching', 'description' => 'A powerful apostolic declaration marking the beginning of a new season for the Wisdom Envoys family. The mandates of God for the year are unveiled.', 'featured' => true],
            ['year' => 2025, 'title' => 'The Power of Divine Alignment', 'speaker' => 'Sir Jervis Teh', 'series' => 'This Is Our Day — TIAG 2025', 'category' => 'Teaching', 'description' => 'Understanding how divine alignment positions you for supernatural breakthroughs and kingdom influence in your sphere of work.', 'featured' => false],
            ['year' => 2025, 'title' => 'Kingdom Culture in the Marketplace', 'speaker' => 'Oluwatobiloba Oshunbiyi', 'series' => 'Marketplace Expressions', 'category' => 'Leadership', 'description' => 'A deep dive into how believers can carry the culture of the Kingdom into their professional environments and societal sectors.', 'featured' => false],
            ['year' => 2024, 'title' => 'Walking in Apostolic Authority', 'speaker' => 'Sir Jervis Teh', 'series' => 'Dimensional Realities', 'category' => 'Teaching', 'description' => 'An exposition on the authority vested in believers and how to exercise it effectively in spiritual and physical realms.', 'featured' => true],
            ['year' => 2024, 'title' => 'The Ethics of the Kingdom', 'speaker' => 'Pastor Dele Osunmakinde', 'series' => 'The Theology of Work', 'category' => 'Teaching', 'description' => 'Exploring the moral and ethical standards that govern Kingdom citizens in their daily lives and professional conduct.', 'featured' => false],
            ['year' => 2023, 'title' => 'Building the New Creation Institution', 'speaker' => 'Sir Jervis Teh', 'series' => 'Foundational Truths of the Mandate', 'category' => 'Series', 'description' => 'The foundational pillars of the Wisdom Envoys mandate and the pursuit of divine purpose through institutional structures.', 'featured' => false],
            ['year' => 2022, 'title' => 'Strategic Intercession for Nations', 'speaker' => 'Sir Jervis Teh', 'series' => 'Strategic Intercession for Nations', 'category' => 'Teaching', 'description' => 'Understanding the prophetic dimensions of intercession and how targeted prayers can shift spiritual atmospheres over territories.', 'featured' => false],
            ['year' => 2021, 'title' => 'Dimensional Realities of the Believer', 'speaker' => 'Sir Jervis Teh', 'series' => 'Dimensional Realities', 'category' => 'Series', 'description' => 'Exploring the depth of spiritual authority and the manifestation of the Kingdom through the prism of eternal life.', 'featured' => true],
            ['year' => 2020, 'title' => 'The Consecrated Life in a Season of Shift', 'speaker' => 'Pastor Dele Osunmakinde', 'series' => 'The Consecrated Life', 'category' => 'Teaching', 'description' => 'A season of deep solitude and realignment, focusing on the internal architecture of a believer in times of global shift.', 'featured' => false],
            ['year' => 2019, 'title' => 'The Administrative Dimension of the Believer', 'speaker' => 'Pastor Dele Osunmakinde', 'series' => 'The Administrative Dimension of the Believer', 'category' => 'Series', 'description' => 'A comprehensive series on the governance and administrative responsibilities that come with spiritual maturity.', 'featured' => true],
            ['year' => 2019, 'title' => 'The Theology of Work', 'speaker' => 'Pastor Dele Osunmakinde', 'series' => 'The Theology of Work', 'category' => 'Teaching', 'description' => 'Understanding work as worship and the divine purpose behind professional labour and enterprise.', 'featured' => false],
            ['year' => 2019, 'title' => 'The Covenant Wealth', 'speaker' => 'Pastor Dele Osunmakinde', 'series' => 'The Covenant Wealth', 'category' => 'Teaching', 'description' => 'Unlocking the financial principles embedded in the Covenant and walking in divine prosperity.', 'featured' => false],
            ['year' => 2018, 'title' => 'Foundational Truths of the Mandate', 'speaker' => 'Sir Jervis Teh', 'series' => 'Foundational Truths of the Mandate', 'category' => 'Series', 'description' => 'The inaugural series establishing the core pillars of the Wisdom Envoys mandate and the pursuit of divine purpose.', 'featured' => false],
        ];

        foreach ($messages as $data) {
            $yearRecord = $yearRecords[$data['year']] ?? null;
            $seriesRecord = $seriesList->firstWhere('title', $data['series']);
            $categoryRecord = $categories->firstWhere('name', $data['category']);

            Message::create([
                'year_id' => $yearRecord?->id,
                'series_id' => $seriesRecord?->id,
                'category_id' => $categoryRecord?->id,
                'speaker' => $data['speaker'],
                'title' => $data['title'],
                'description' => $data['description'],
                'audio' => 'https://pub-aa5be4a8c7f74e1b96ef629d14f27bb6.r2.dev/messages/' . Str::slug($data['title']) . '.mp3',
                'featured' => $data['featured'],
                'published_at' => \Carbon\Carbon::create($data['year'])->addDays(rand(0, 364)),
                'status' => true,
            ]);
        }
    }
}
