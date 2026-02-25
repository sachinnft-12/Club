<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Club;
use App\Models\CoachProfile;
use App\Models\HallOfFameEntry;
use App\Models\NewsEvent;
use App\Models\ResourceLink;
use App\Models\Tournament;
use App\Models\User;

class DashboardController extends Controller
{
    public function __invoke()
    {
        return view('admin.dashboard', [
            'counts' => [
                'users' => User::count(),
                'clubs' => Club::count(),
                'coaches' => CoachProfile::count(),
                'tournaments' => Tournament::count(),
                'resources' => ResourceLink::count(),
                'news' => NewsEvent::count(),
                'banners' => Banner::count(),
                'hall_of_fame' => HallOfFameEntry::count(),
            ],
        ]);
    }
}
