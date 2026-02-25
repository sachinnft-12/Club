<?php

namespace App\Http\Controllers;

use App\Models\CoachProfile;

class CoachController extends Controller
{
    public function index()
    {
        $coaches = CoachProfile::query()->latest()->paginate(12);

        return view('coaches.index', compact('coaches'));
    }

    public function show(CoachProfile $coach)
    {
        return view('coaches.show', compact('coach'));
    }
}
