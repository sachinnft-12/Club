@extends('layouts.app')

@section('content')
<h1>Find Clubs</h1>
<form method="GET" class="search-row">
    <input type="text" name="location" value="{{ request('location') }}" placeholder="Location">
    <input type="text" name="name" value="{{ request('name') }}" placeholder="Club Name">
    <button type="submit" class="btn">Search</button>
</form>
<div class="grid">
    @foreach($clubs as $club)
        <article class="card">
            <h3><a href="{{ route('clubs.show', $club) }}">{{ $club->display_name }}</a></h3>
            <p>{{ $club->city }}, {{ $club->state }}</p>
        </article>
    @endforeach
</div>
{{ $clubs->links() }}
@endsection
