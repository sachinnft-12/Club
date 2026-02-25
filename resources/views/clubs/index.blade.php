@extends('layouts.app')

@section('content')
<div class="section-title">
    <h1>Find Clubs</h1>
</div>
<form method="GET" class="form-grid card">
    <input type="text" name="location" value="{{ request('location') }}" placeholder="Location (e.g. Bengaluru)">
    <input type="text" name="name" value="{{ request('name') }}" placeholder="Club Name">
    <button type="submit" class="btn btn-primary">Search</button>
</form>
<div class="grid" style="margin-top:14px;">
    @foreach($clubs as $club)
        <article class="card">
            <img src="{{ asset('images/club-card.svg') }}" alt="Club image">
            <span class="tag">{{ $club->status }}</span>
            <h3><a href="{{ route('clubs.show', $club) }}">{{ $club->display_name }}</a></h3>
            <p class="muted">{{ $club->city }}, {{ $club->state }}</p>
            <p class="muted">{{ $club->description }}</p>
        </article>
    @endforeach
</div>
{{ $clubs->links() }}
@endsection
