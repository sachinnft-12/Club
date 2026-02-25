<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsAdminController extends Controller
{
    public function index()
    {
        $items = NewsEvent::latest()->paginate(20);
        return view('admin.news.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'category' => ['required','in:tournament,event,world_result,club_opening,general'],
            'summary' => ['nullable','string'],
            'content' => ['nullable','string'],
        ]);
        $data['slug'] = Str::slug($data['title']).'-'.Str::lower(Str::random(4));
        $data['published_at'] = now();
        $data['is_active'] = $request->boolean('is_active', true);
        NewsEvent::create($data);
        return redirect()->route('admin.news.index')->with('status', 'News created.');
    }

    public function edit(NewsEvent $news)
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, NewsEvent $news)
    {
        $data = $request->validate([
            'title' => ['required','string','max:255'],
            'category' => ['required','in:tournament,event,world_result,club_opening,general'],
            'summary' => ['nullable','string'],
            'content' => ['nullable','string'],
        ]);
        $data['is_active'] = $request->boolean('is_active');
        $news->update($data);
        return redirect()->route('admin.news.index')->with('status', 'News updated.');
    }

    public function destroy(NewsEvent $news)
    {
        $news->delete();
        return back()->with('status', 'News deleted.');
    }
}
