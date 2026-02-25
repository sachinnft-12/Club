@extends('layouts.app')
@section('content')
<h1>Edit Banner</h1>
<form method="POST" action="{{ route('admin.banners.update', $banner) }}" class="stack">@csrf @method('PUT')
<input name="title" value="{{ $banner->title }}" required><input name="image_path" value="{{ $banner->image_path }}" required><input name="target_url" value="{{ $banner->target_url }}"><input name="sponsor_name" value="{{ $banner->sponsor_name }}">
<label><input type="checkbox" name="is_active" value="1" @checked($banner->is_active)> Active</label><button class="btn">Save</button></form>
@endsection
