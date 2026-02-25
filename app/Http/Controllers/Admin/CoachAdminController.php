<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CoachProfile;
use Illuminate\Http\Request;

class CoachAdminController extends Controller
{
    public function index()
    {
        $items = CoachProfile::with('user')->latest()->paginate(20);
        return view('admin.coaches.index', compact('items'));
    }

    public function edit(CoachProfile $coach)
    {
        return view('admin.coaches.edit', compact('coach'));
    }

    public function update(Request $request, CoachProfile $coach)
    {
        $data = $request->validate([
            'headline' => ['nullable','string','max:255'],
            'city' => ['nullable','string','max:120'],
            'state' => ['nullable','string','max:120'],
            'country' => ['nullable','string','max:120'],
            'is_academy' => ['nullable','boolean'],
        ]);

        $data['is_academy'] = $request->boolean('is_academy');
        $coach->update($data);
        return redirect()->route('admin.coaches.index')->with('status', 'Coach updated.');
    }

    public function destroy(CoachProfile $coach)
    {
        $coach->delete();
        return back()->with('status', 'Coach deleted.');
    }
}
