<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create admin user
        User::create([
            'name' => 'Admin',
            'email' => 'admin@covenantoflife.com',
            'password' => Hash::make('password'),
            'is_admin' => true,
        ]);

        $this->call([
            SettingSeeder::class,
            LeaderSeeder::class,
            VisionSeeder::class,
            BranchSeeder::class,
            MessageYearSeeder::class,
            MessageCategorySeeder::class,
            SeriesSeeder::class,
            MessageSeeder::class,
            PodcastSeeder::class,
            ServiceSeeder::class,
            ProductSeeder::class,
            StreamSeeder::class,
            TeamMemberSeeder::class,
        ]);
    }
}
