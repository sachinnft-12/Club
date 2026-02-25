@extends('layouts.app')
@section('content')
<h1>Edit News</h1>
<form method="POST" action="{{ route('admin.news.update', $news) }}" class="stack">@csrf @method('PUT')
<input name="title" value="{{ $news->title }}" required>
<select name="category"><option>{{ $news->category }}</option><option>general</option><option>tournament</option><option>event</option><option>world_result</option><option>club_opening</option></select>
<textarea name="summary">{{ $news->summary }}</textarea><textarea name="content">{{ $news->content }}</textarea>
<label><input type="checkbox" name="is_active" value="1" @checked($news->is_active)> Active</label><button class="btn">Save</button></form>
@endsection
