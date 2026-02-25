@extends('layouts.app')
@section('content')
<h1>Edit Club</h1>
<form method="POST" action="{{ route('admin.clubs.update', $club) }}" class="stack">@csrf @method('PUT')
<input name="display_name" value="{{ $club->display_name }}" required>
<input name="city" value="{{ $club->city }}" required>
<input name="state" value="{{ $club->state }}" required>
<input name="country" value="{{ $club->country }}" required>
<select name="status"><option>pending</option><option>approved</option><option>rejected</option></select>
<button class="btn">Save</button></form>
@endsection
