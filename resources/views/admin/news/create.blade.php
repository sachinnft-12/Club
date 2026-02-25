@extends('layouts.app')
@section('content')
<h1>Add News</h1>
<form method="POST" action="{{ route('admin.news.store') }}" class="stack">@csrf
<input name="title" required>
<select name="category"><option>general</option><option>tournament</option><option>event</option><option>world_result</option><option>club_opening</option></select>
<textarea name="summary"></textarea><textarea name="content"></textarea>
<label><input type="checkbox" name="is_active" value="1" checked> Active</label><button class="btn">Save</button></form>
@endsection
