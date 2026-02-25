<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ResourceLink;
use Illuminate\Http\Request;

class ResourceAdminController extends Controller
{
    public function index()
    {
        $items = ResourceLink::latest()->paginate(20);
        return view('admin.resources.index', compact('items'));
    }

    public function create()
    {
        return view('admin.resources.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'type' => ['required','in:youtube,affiliate,guide'],
            'url' => ['required','url'],
            'description' => ['nullable','string'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        ResourceLink::create($data);
        return redirect()->route('admin.resources.index')->with('status', 'Resource created.');
    }

    public function edit(ResourceLink $resource)
    {
        return view('admin.resources.edit', compact('resource'));
    }

    public function update(Request $request, ResourceLink $resource)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'type' => ['required','in:youtube,affiliate,guide'],
            'url' => ['required','url'],
            'description' => ['nullable','string'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $resource->update($data);
        return redirect()->route('admin.resources.index')->with('status', 'Resource updated.');
    }

    public function destroy(ResourceLink $resource)
    {
        $resource->delete();
        return back()->with('status', 'Resource deleted.');
    }
}
