<?php

namespace App\Http\Controllers;

use App\Models\Club;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ClubController extends Controller
{
    public function index(Request $request)
    {
        $clubs = Club::query()
            ->when($request->string('location')->isNotEmpty(), function ($q) use ($request) {
                $q->where('city', 'like', '%'.$request->location.'%')
                  ->orWhere('state', 'like', '%'.$request->location.'%');
            })
            ->when($request->string('name')->isNotEmpty(), fn ($q) => $q->where('display_name', 'like', '%'.$request->name.'%'))
            ->latest()
            ->paginate(12)
            ->withQueryString();

        return view('clubs.index', compact('clubs'));
    }

    public function show(Club $club)
    {
        $club->load('reviews.user', 'tournaments');

        return view('clubs.show', compact('club'));
    }

    public function create()
    {
        return view('clubs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'display_name' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'city' => ['required', 'string', 'max:100'],
            'state' => ['required', 'string', 'max:100'],
            'country' => ['required', 'string', 'max:100'],
            'address' => ['nullable', 'string', 'max:500'],
            'phone' => ['nullable', 'string', 'max:30'],
            'email' => ['nullable', 'email'],
            'website' => ['nullable', 'url'],
        ]);

        $base = Str::slug($validated['display_name'].'-'.$validated['city']);
        $validated['public_slug'] = $base.'-'.Str::lower(Str::random(4));
        $validated['user_id'] = $request->user()?->id;
        $validated['status'] = 'pending';

        $club = Club::query()->create($validated);

        return redirect()->route('clubs.show', $club)->with('status', 'Club registered successfully.');
    }
}
