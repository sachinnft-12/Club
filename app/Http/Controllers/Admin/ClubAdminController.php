<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubAdminController extends Controller
{
    public function index()
    {
        $items = Club::latest()->paginate(20);
        return view('admin.clubs.index', compact('items'));
    }

    public function edit(Club $club)
    {
        return view('admin.clubs.edit', compact('club'));
    }

    public function update(Request $request, Club $club)
    {
        $data = $request->validate([
            'display_name' => ['required','string','max:255'],
            'city' => ['required','string','max:120'],
            'state' => ['required','string','max:120'],
            'country' => ['required','string','max:120'],
            'status' => ['required','in:pending,approved,rejected'],
        ]);

        $club->update($data);
        return redirect()->route('admin.clubs.index')->with('status', 'Club updated.');
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return back()->with('status', 'Club deleted.');
    }
}
