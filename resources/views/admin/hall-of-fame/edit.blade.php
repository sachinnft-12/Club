@extends('layouts.app')
@section('content')
<h1>Edit Hall of Fame Entry</h1>
<form method="POST" action="{{ route('admin.hall-of-fame.update', $entry) }}" class="stack">@csrf @method('PUT')
<input name="name" value="{{ $entry->name }}" required><input name="country" value="{{ $entry->country }}" required><input name="achievement" value="{{ $entry->achievement }}" required><input name="rank_position" type="number" value="{{ $entry->rank_position }}">
<label><input type="checkbox" name="featured" value="1" @checked($entry->featured)> Featured</label><button class="btn">Save</button></form>
@endsection
