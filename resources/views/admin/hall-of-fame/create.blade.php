@extends('layouts.app')
@section('content')
<h1>Add Hall of Fame Entry</h1>
<form method="POST" action="{{ route('admin.hall-of-fame.store') }}" class="stack">@csrf
<input name="name" required><input name="country" value="India" required><input name="achievement" required><input name="rank_position" type="number">
<label><input type="checkbox" name="featured" value="1"> Featured</label><button class="btn">Save</button></form>
@endsection
