<?php

namespace Database\Seeders;

use App\Models\Stream;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StreamSeeder extends Seeder
{
    public function run(): void
    {
        $streams = [
            ['name' => 'Media & Tech', 'description' => 'Digital content creation, live streaming, social media, and technical production for kingdom communication.', 'icon' => 'videocam'],
            ['name' => 'Worship & Prayer', 'description' => 'Leading worship, intercession, and spiritual covering across all ministry activities.', 'icon' => 'music_note'],
            ['name' => 'Teaching & Discipleship', 'description' => 'Bible study, MLTP programs, and spiritual formation for believers at every level.', 'icon' => 'school'],
            ['name' => 'Finance & Administration', 'description' => 'Stewardship, resource management, and administrative coordination for the ministry.', 'icon' => 'account_balance'],
            ['name' => 'Outreach & Missions', 'description' => 'Evangelism, community development, and global mission coordination.', 'icon' => 'public'],
            ['name' => 'Protocol & Hospitality', 'description' => 'Event coordination, guest relations, and hospitality across all ministry gatherings.', 'icon' => 'handshake'],
            ['name' => 'Creative Arts', 'description' => 'Visual design, drama, spoken word, and creative expressions of the Kingdom.', 'icon' => 'palette'],
            ['name' => 'Youth & Campus', 'description' => 'Engaging and discipling young people and students across campuses and communities.', 'icon' => 'groups'],
        ];

        foreach ($streams as $data) {
            Stream::create([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'description' => $data['description'],
                'icon' => $data['icon'],
                'status' => true,
            ]);
        }
    }
}
