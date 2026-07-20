<?php

namespace Database\Seeders;

use App\Models\Stream;
use App\Models\TeamMember;
use Illuminate\Database\Seeder;

class TeamMemberSeeder extends Seeder
{
    public function run(): void
    {
        $streams = Stream::all()->keyBy('name');

        $members = [
            ['stream' => 'Media & Tech', 'name' => 'Caleb Ngum', 'role' => 'Head of Media & Tech', 'bio' => 'Overseeing all digital content, live streaming, and technical production for the ministry.'],
            ['stream' => 'Media & Tech', 'name' => 'Sarah Johnson', 'role' => 'Social Media Lead', 'bio' => 'Managing online presence and digital engagement across all platforms.'],
            ['stream' => 'Media & Tech', 'name' => 'David Chen', 'role' => 'Sound Engineer', 'bio' => 'Managing sound systems and audio production for services and events.'],
            ['stream' => 'Worship & Prayer', 'name' => 'Grace Obi', 'role' => 'Worship Leader', 'bio' => 'Leading worship sessions and coordinating the worship team for all ministry gatherings.'],
            ['stream' => 'Worship & Prayer', 'name' => 'Michael Adeyemi', 'role' => 'Prayer Coordinator', 'bio' => 'Coordinating intercession teams and spiritual covering for the ministry.'],
            ['stream' => 'Worship & Prayer', 'name' => 'Esther Kim', 'role' => 'Choir Director', 'bio' => 'Leading the choir and vocal teams in praise and worship ministry.'],
            ['stream' => 'Teaching & Discipleship', 'name' => 'Pastor Dele Osunmakinde', 'role' => 'Teaching Faculty', 'bio' => 'A seasoned teacher of the Word, focused on raising believers through structured discipleship.'],
            ['stream' => 'Teaching & Discipleship', 'name' => 'Sir Jervis Teh', 'role' => 'MLTP Director', 'bio' => 'Leading the Marketplace Leadership Training Program to equip believers for kingdom influence.'],
            ['stream' => 'Teaching & Discipleship', 'name' => 'Oluwatobiloba Oshunbiyi', 'role' => 'Bible Study Lead', 'bio' => 'Facilitating deep Bible study sessions and spiritual growth programs.'],
            ['stream' => 'Finance & Administration', 'name' => 'Rebecca Tan', 'role' => 'Finance Director', 'bio' => 'Overseeing financial stewardship and resource management for the ministry.'],
            ['stream' => 'Finance & Administration', 'name' => 'James Eze', 'role' => 'Admin Coordinator', 'bio' => 'Coordinating administrative operations and organizational processes.'],
            ['stream' => 'Outreach & Missions', 'name' => 'Daniel Okafor', 'role' => 'Missions Director', 'bio' => 'Leading global outreach initiatives and mission coordination across nations.'],
            ['stream' => 'Outreach & Missions', 'name' => 'Fatima Hassan', 'role' => 'Community Developer', 'bio' => 'Building community partnerships and coordinating local development projects.'],
            ['stream' => 'Outreach & Missions', 'name' => 'Paul Mbah', 'role' => 'Evangelism Lead', 'bio' => 'Coordinating evangelistic outreaches and soul-winning campaigns.'],
            ['stream' => 'Protocol & Hospitality', 'name' => 'Victoria Asuquo', 'role' => 'Protocol Director', 'bio' => 'Managing event logistics, guest relations, and hospitality across all ministry gatherings.'],
            ['stream' => 'Protocol & Hospitality', 'name' => 'Samuel Bassey', 'role' => 'Guest Relations', 'bio' => 'Ensuring smooth hosting of guests and speakers at all ministry events.'],
            ['stream' => 'Creative Arts', 'name' => 'Amara Nwosu', 'role' => 'Creative Director', 'bio' => 'Leading visual design, drama, and creative expressions of the Kingdom mandate.'],
            ['stream' => 'Creative Arts', 'name' => 'Ibrahim Musa', 'role' => 'Graphic Designer', 'bio' => 'Creating visual content and designs for ministry materials and communications.'],
            ['stream' => 'Youth & Campus', 'name' => 'Nathaniel Ogun', 'role' => 'Youth Pastor', 'bio' => 'Shepherding young people and raising the next generation of kingdom ambassadors.'],
            ['stream' => 'Youth & Campus', 'name' => 'Chioma Uche', 'role' => 'Campus Outreach Lead', 'bio' => 'Connecting with students across campuses and facilitating campus fellowship.'],
        ];

        foreach ($members as $data) {
            $stream = $streams[$data['stream']] ?? null;
            if (!$stream) continue;

            TeamMember::create([
                'stream_id' => $stream->id,
                'name' => $data['name'],
                'role' => $data['role'],
                'bio' => $data['bio'],
                'featured' => false,
                'status' => true,
            ]);
        }
    }
}
