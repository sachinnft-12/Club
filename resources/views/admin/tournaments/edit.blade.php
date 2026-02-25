@extends('layouts.app')
@section('content')
<h1>Edit Tournament</h1>
<form method="POST" action="{{ route('admin.tournaments.update', $tournament) }}" class="stack">@csrf @method('PUT')
<input name="title" value="{{ $tournament->title }}" required>
<select name="status"><option>draft</option><option>open</option><option>closed</option></select>
<textarea name="register_info">{{ $tournament->register_info }}</textarea>
<textarea name="winner_list">{{ $tournament->winner_list }}</textarea>
<button class="btn">Save</button></form>
@endsection
