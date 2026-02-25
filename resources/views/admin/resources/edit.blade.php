@extends('layouts.app')
@section('content')
<h1>Edit Resource</h1>
<form method="POST" action="{{ route('admin.resources.update', $resource) }}" class="stack">@csrf @method('PUT')
<input name="title" value="{{ $resource->title }}" required><select name="type"><option>{{ $resource->type }}</option><option>youtube</option><option>affiliate</option><option>guide</option></select>
<input name="url" value="{{ $resource->url }}" required><textarea name="description">{{ $resource->description }}</textarea>
<label><input type="checkbox" name="is_active" value="1" @checked($resource->is_active)> Active</label><button class="btn">Save</button></form>
@endsection
