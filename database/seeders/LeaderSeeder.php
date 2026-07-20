<?php

namespace Database\Seeders;

use App\Models\Leader;
use Illuminate\Database\Seeder;

class LeaderSeeder extends Seeder
{
    public function run(): void
    {
        Leader::create([
            'name' => 'Sir Jervis Teh',
            'title' => 'Founder',
            'bio' => 'Sir Jervis Teh is the Founder of Wisdom Envoys, an institution raising people empowered by God\'s Wisdom to model the Culture of God\'s Kingdom across every stratum and sphere of human life. He is a visionary leader, kingdom strategist, and equipping ministry committed to revealing Christ as the Embodiment of God\'s Wisdom.',
            'is_team_leader' => true,
            'display_order' => 0,
        ]);

        Leader::create([
            'name' => 'Oluwatobiloba Oshunbiyi',
            'title' => 'Team Leader',
            'bio' => 'Oluwatobiloba Oshunbiyi serves as the Team Leader at Wisdom Envoys. He is an Instructor, Equipper, Kingdompreneur and Consultant with a passion for raising the next generation of Kingdom leaders through intentional discipleship and spiritual development.',
            'is_team_leader' => false,
            'display_order' => 1,
        ]);

        Leader::create([
            'name' => 'Pastor Dele Osunmakinde',
            'title' => 'Senior Pastor',
            'bio' => 'Pastor Dele Osunmakinde is a seasoned minister of the Gospel with a passion for raising the next generation of Kingdom leaders. His teachings focus on the administrative dimensions of the believer and the theology of work.',
            'is_team_leader' => false,
            'display_order' => 2,
        ]);
    }
}
