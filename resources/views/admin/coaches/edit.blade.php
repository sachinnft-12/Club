@extends('layouts.app')
@section('content')
<h1>Edit Coach</h1>
<form method="POST" action="{{ route('admin.coaches.update', $coach) }}" class="stack">@csrf @method('PUT')
<input name="headline" value="{{ $coach->headline }}">
<input name="city" value="{{ $coach->city }}">
<input name="state" value="{{ $coach->state }}">
<input name="country" value="{{ $coach->country }}">
<label><input type="checkbox" name="is_academy" value="1" @checked($coach->is_academy)> Is academy</label>
<button class="btn">Save</button></form>
@endsection
