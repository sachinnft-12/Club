<?php

namespace App\Http\Controllers;

use App\Models\HallOfFameEntry;
use App\Models\NewsEvent;
use App\Models\ResourceLink;

class PageController extends Controller
{
    public function resources()
    {
        $resources = ResourceLink::query()->where('is_active', true)->latest()->get();

        return view('pages.resources', compact('resources'));
    }

    public function hallOfFame()
    {
        $entries = HallOfFameEntry::query()->orderBy('rank_position')->paginate(25);

        return view('pages.hall-of-fame', compact('entries'));
    }

    public function news()
    {
        $items = NewsEvent::query()->where('is_active', true)->latest('published_at')->paginate(20);

        return view('pages.news', compact('items'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function terms()
    {
        return view('pages.terms');
    }

    public function policy()
    {
        return view('pages.policy');
    }
}
