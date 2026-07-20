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
            'description' => 'A weekly prayer gathering designed to strengthen believers, deepen faith, and intercede for individuals, communities, and nations. The program creates an atmosphere for spiritual growth, fellowship, and seeking God\'s direction.',
            'button_text' => 'JOIN US',
            'button_url' => '#',
            'status' => true,
            'display_order' => 0,
        ]);

        Service::create([
            'title' => 'Wisdom Convergence',
            'description' => 'A platform designed for deeper engagement with God\'s wisdom, bringing people together to receive teachings, insights, and practical understanding for kingdom living.',
            'button_text' => 'LEARN MORE',
            'button_url' => '#',
            'status' => true,
            'display_order' => 1,
        ]);

        Service::create([
            'title' => 'Marketplace Expressions',
            'description' => 'Campus and societal expressions designed to raise kingdom functionaries who demonstrate God\'s wisdom and influence within different sectors of society. This initiative focuses on preparing individuals to transform their environments through excellence, leadership, and kingdom values.',
            'button_text' => 'EXPLORE',
            'button_url' => '#',
            'status' => true,
            'display_order' => 2,
        ]);

        Service::create([
            'title' => 'The Emergence of Kingdom Envoys',
            'description' => 'An annual gathering designed to bring together people from different backgrounds for spiritual impartation, leadership development, and kingdom advancement. The program focuses on raising and equipping individuals who will become effective representatives of God\'s Kingdom.',
            'button_text' => 'DISCOVER',
            'button_url' => '#',
            'status' => true,
            'display_order' => 3,
        ]);
    }
}
