<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserAdminController extends Controller
{
    public function index()
    {
        $items = User::latest()->paginate(20);
        return view('admin.users.index', compact('items'));
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => ['required','string','max:255'],
            'email' => ['required','email'],
            'role' => ['required','in:admin,club_owner,coach,player'],
        ]);

        $user->update($data);
        return redirect()->route('admin.users.index')->with('status', 'User updated.');
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('status', 'User deleted.');
    }
}
