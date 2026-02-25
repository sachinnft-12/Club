@extends('layouts.app')
@section('content')
<h1>Add Banner</h1>
<form method="POST" action="{{ route('admin.banners.store') }}" class="stack">@csrf
<input name="title" required><input name="image_path" required><input name="target_url"><input name="sponsor_name">
<label><input type="checkbox" name="is_active" value="1"> Active</label><button class="btn">Save</button></form>
@endsection
