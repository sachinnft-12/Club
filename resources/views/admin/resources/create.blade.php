@extends('layouts.app')
@section('content')
<h1>Add Resource</h1>
<form method="POST" action="{{ route('admin.resources.store') }}" class="stack">@csrf
<input name="title" required><select name="type"><option>youtube</option><option>affiliate</option><option>guide</option></select>
<input name="url" required><textarea name="description"></textarea>
<label><input type="checkbox" name="is_active" value="1" checked> Active</label><button class="btn">Save</button></form>
@endsection
