<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HallOfFameEntry;
use Illuminate\Http\Request;

class HallOfFameAdminController extends Controller
{
    public function index()
    {
        $items = HallOfFameEntry::orderBy('rank_position')->paginate(20);
        return view('admin.hall-of-fame.index', compact('items'));
    }

    public function create()
    {
        return view('admin.hall-of-fame.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'country' => ['required','string','max:120'],
            'achievement' => ['required','string','max:255'],
            'rank_position' => ['nullable','integer','min:1'],
        ]);
        $data['featured'] = $request->boolean('featured');
        HallOfFameEntry::create($data);
        return redirect()->route('admin.hall-of-fame.index')->with('status', 'Hall of fame entry created.');
    }

    public function edit(HallOfFameEntry $hall_of_fame)
    {
        return view('admin.hall-of-fame.edit', ['entry' => $hall_of_fame]);
    }

    public function update(Request $request, HallOfFameEntry $hall_of_fame)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'country' => ['required','string','max:120'],
            'achievement' => ['required','string','max:255'],
            'rank_position' => ['nullable','integer','min:1'],
        ]);
        $data['featured'] = $request->boolean('featured');
        $hall_of_fame->update($data);
        return redirect()->route('admin.hall-of-fame.index')->with('status', 'Hall of fame entry updated.');
    }

    public function destroy(HallOfFameEntry $hall_of_fame)
    {
        $hall_of_fame->delete();
        return back()->with('status', 'Hall of fame entry deleted.');
    }
}
