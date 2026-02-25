<?php

namespace App\Http\Controllers;

use App\Models\Tournament;

class TournamentController extends Controller
{
    public function index()
    {
        $tournaments = Tournament::query()->with('club')->orderBy('start_at')->paginate(12);

        return view('tournaments.index', compact('tournaments'));
    }

    public function show(Tournament $tournament)
    {
        $tournament->load('club');

        return view('tournaments.show', compact('tournament'));
    }
}
