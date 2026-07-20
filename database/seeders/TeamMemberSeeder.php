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

        TeamMember::create([
            'stream_id' => null,
            'name' => 'Sir Jervis Teh',
            'role' => 'Founder & Visionary',
            'bio' => 'The visionary behind the Wisdom Envoys mandate, raising kingdom ambassadors across the globe through apostolic and prophetic leadership.',
            'is_founder' => true,
            'is_stream_lead' => false,
            'featured' => true,
            'status' => true,
        ]);

        $members = [
            ['stream' => 'Media & Tech', 'name' => 'Caleb Ngum', 'role' => 'Head of Media & Tech', 'bio' => 'Overseeing all digital content, live streaming, and technical production for the ministry.', 'lead' => true],
            ['stream' => 'Media & Tech', 'name' => 'Sarah Johnson', 'role' => 'Social Media Lead', 'bio' => 'Managing online presence and digital engagement across all platforms.', 'lead' => false],
            ['stream' => 'Media & Tech', 'name' => 'David Chen', 'role' => 'Sound Engineer', 'bio' => 'Managing sound systems and audio production for services and events.', 'lead' => false],

            ['stream' => 'Worship & Prayer', 'name' => 'Grace Obi', 'role' => 'Worship Leader', 'bio' => 'Leading worship sessions and coordinating the worship team for all ministry gatherings.', 'lead' => true],
            ['stream' => 'Worship & Prayer', 'name' => 'Michael Adeyemi', 'role' => 'Prayer Coordinator', 'bio' => 'Coordinating intercession teams and spiritual covering for the ministry.', 'lead' => false],
            ['stream' => 'Worship & Prayer', 'name' => 'Esther Kim', 'role' => 'Choir Director', 'bio' => 'Leading the choir and vocal teams in praise and worship ministry.', 'lead' => false],

            ['stream' => 'Teaching & Discipleship', 'name' => 'Pastor Dele Osunmakinde', 'role' => 'Teaching Faculty', 'bio' => 'A seasoned teacher of the Word, focused on raising believers through structured discipleship.', 'lead' => true],
            ['stream' => 'Teaching & Discipleship', 'name' => 'Oluwatobiloba Oshunbiyi', 'role' => 'Bible Study Lead', 'bio' => 'Facilitating deep Bible study sessions and spiritual growth programs.', 'lead' => false],

            ['stream' => 'Finance & Administration', 'name' => 'Rebecca Tan', 'role' => 'Finance Director', 'bio' => 'Overseeing financial stewardship and resource management for the ministry.', 'lead' => true],
            ['stream' => 'Finance & Administration', 'name' => 'James Eze', 'role' => 'Admin Coordinator', 'bio' => 'Coordinating administrative operations and organizational processes.', 'lead' => false],

            ['stream' => 'Outreach & Missions', 'name' => 'Daniel Okafor', 'role' => 'Missions Director', 'bio' => 'Leading global outreach initiatives and mission coordination across nations.', 'lead' => true],
            ['stream' => 'Outreach & Missions', 'name' => 'Fatima Hassan', 'role' => 'Community Developer', 'bio' => 'Building community partnerships and coordinating local development projects.', 'lead' => false],
            ['stream' => 'Outreach & Missions', 'name' => 'Paul Mbah', 'role' => 'Evangelism Lead', 'bio' => 'Coordinating evangelistic outreaches and soul-winning campaigns.', 'lead' => false],

            ['stream' => 'Protocol & Hospitality', 'name' => 'Victoria Asuquo', 'role' => 'Protocol Director', 'bio' => 'Managing event logistics, guest relations, and hospitality across all ministry gatherings.', 'lead' => true],
            ['stream' => 'Protocol & Hospitality', 'name' => 'Samuel Bassey', 'role' => 'Guest Relations', 'bio' => 'Ensuring smooth hosting of guests and speakers at all ministry events.', 'lead' => false],

            ['stream' => 'Creative Arts', 'name' => 'Amara Nwosu', 'role' => 'Creative Director', 'bio' => 'Leading visual design, drama, and creative expressions of the Kingdom mandate.', 'lead' => true],
            ['stream' => 'Creative Arts', 'name' => 'Ibrahim Musa', 'role' => 'Graphic Designer', 'bio' => 'Creating visual content and designs for ministry materials and communications.', 'lead' => false],

            ['stream' => 'Youth & Campus', 'name' => 'Nathaniel Ogun', 'role' => 'Youth Pastor', 'bio' => 'Shepherding young people and raising the next generation of kingdom ambassadors.', 'lead' => true],
            ['stream' => 'Youth & Campus', 'name' => 'Chioma Uche', 'role' => 'Campus Outreach Lead', 'bio' => 'Connecting with students across campuses and facilitating campus fellowship.', 'lead' => false],
        ];

        foreach ($members as $data) {
            $stream = $streams[$data['stream']] ?? null;
            if (!$stream) continue;

            TeamMember::create([
                'stream_id' => $stream->id,
                'name' => $data['name'],
                'role' => $data['role'],
                'bio' => $data['bio'],
                'is_founder' => false,
                'is_stream_lead' => $data['lead'],
                'featured' => false,
                'status' => true,
            ]);
        }
    }
}
