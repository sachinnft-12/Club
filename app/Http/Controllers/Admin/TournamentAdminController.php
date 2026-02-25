<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tournament;
use Illuminate\Http\Request;

class TournamentAdminController extends Controller
{
    public function index()
    {
        $items = Tournament::with('club')->latest()->paginate(20);
        return view('admin.tournaments.index', compact('items'));
    }

    public function edit(Tournament $tournament)
    {
        return view('admin.tournaments.edit', compact('tournament'));
    }

    public function update(Request $request, Tournament $tournament)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'status' => ['required','in:draft,open,closed'],
            'register_info' => ['nullable','string'],
            'winner_list' => ['nullable','string'],
        ]);

        $tournament->update($data);
        return redirect()->route('admin.tournaments.index')->with('status', 'Tournament updated.');
    }

    public function destroy(Tournament $tournament)
    {
        $tournament->delete();
        return back()->with('status', 'Tournament deleted.');
    }
}
