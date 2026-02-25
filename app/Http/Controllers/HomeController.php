<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Club;
use App\Models\CoachProfile;
use App\Models\HallOfFameEntry;
use App\Models\NewsEvent;
use App\Models\Tournament;

class HomeController extends Controller
{
    public function __invoke()
    {
        return view('pages.home', [
            'featuredClubs' => Club::query()->latest()->take(6)->get(),
            'upcomingTournaments' => Tournament::query()->where('start_at', '>=', now())->orderBy('start_at')->take(4)->get(),
            'hallOfFame' => HallOfFameEntry::query()->where('featured', true)->orderBy('rank_position')->take(10)->get(),
            'news' => NewsEvent::query()->where('is_active', true)->latest('published_at')->take(5)->get(),
            'banners' => Banner::query()->where('is_active', true)->get(),
            'counts' => [
                'clubs' => Club::count(),
                'coaches' => CoachProfile::count(),
                'tournaments' => Tournament::count(),
                'news' => NewsEvent::count(),
            ],
        ]);
    }
}
