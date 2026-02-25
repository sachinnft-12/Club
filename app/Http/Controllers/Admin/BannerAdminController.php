<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;

class BannerAdminController extends Controller
{
    public function index()
    {
        $items = Banner::latest()->paginate(20);
        return view('admin.banners.index', compact('items'));
    }

    public function create()
    {
        return view('admin.banners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'image_path' => ['required','string','max:255'],
            'target_url' => ['nullable','url'],
            'sponsor_name' => ['nullable','string','max:255'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        Banner::create($data);
        return redirect()->route('admin.banners.index')->with('status', 'Banner created.');
    }

    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    public function update(Request $request, Banner $banner)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'image_path' => ['required','string','max:255'],
            'target_url' => ['nullable','url'],
            'sponsor_name' => ['nullable','string','max:255'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $banner->update($data);
        return redirect()->route('admin.banners.index')->with('status', 'Banner updated.');
    }

    public function destroy(Banner $banner)
    {
        $banner->delete();
        return back()->with('status', 'Banner deleted.');
    }
}
