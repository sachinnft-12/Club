<?php

namespace Database\Seeders;

use App\Models\Banner;
use App\Models\Club;
use App\Models\HallOfFameEntry;
use App\Models\NewsEvent;
use App\Models\ResourceLink;
use App\Models\Tournament;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $owner = User::query()->create([
            'name' => 'Club Owner',
            'email' => 'owner@clubscope.test',
            'password' => 'password',
            'role' => 'club_owner',
        ]);

        $club = Club::query()->create([
            'user_id' => $owner->id,
            'display_name' => 'Smash Arena',
            'public_slug' => 'smash-arena-bengaluru-'.Str::lower(Str::random(4)),
            'description' => 'Premier badminton facility with 8 courts.',
            'city' => 'Bengaluru',
            'state' => 'Karnataka',
            'country' => 'India',
            'status' => 'approved',
        ]);

        Tournament::query()->create([
            'club_id' => $club->id,
            'title' => 'Open Monsoon Championship',
            'overview' => 'Singles and doubles categories open.',
            'start_at' => now()->addDays(15),
            'register_info' => 'Call reception or submit web form.',
            'status' => 'open',
        ]);

        ResourceLink::query()->create([
            'title' => 'Backhand Basics by Coach',
            'type' => 'youtube',
            'url' => 'https://www.youtube.com/watch?v=example',
            'description' => 'Technique tutorial for beginners.',
        ]);

        NewsEvent::query()->create([
            'title' => 'National Finals Result',
            'slug' => 'national-finals-result',
            'category' => 'world_result',
            'summary' => 'Top seeds retain titles in finals.',
            'content' => 'Detailed match recap.',
            'published_at' => now(),
        ]);

        HallOfFameEntry::query()->create([
            'name' => 'P. V. Sindhu',
            'country' => 'India',
            'achievement' => 'World Champion, Olympic Medalist',
            'rank_position' => 1,
            'featured' => true,
        ]);

        Banner::query()->create([
            'title' => 'Premium Rackets Offer',
            'image_path' => 'banners/rackets-offer.jpg',
            'target_url' => 'https://example.com/rackets',
            'sponsor_name' => 'Sports Merchant',
            'starts_at' => now(),
            'is_active' => true,
        ]);
    }
}
