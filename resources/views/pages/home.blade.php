@extends('layouts.app')

@section('content')
<section class="hero">
    <h1>Discover clubs, coaches, players, and tournaments.</h1>
    <p>Fast mobile-first platform with free and paid subscriptions.</p>
    <a class="btn" href="{{ route('clubs.index') }}">Locate Clubs</a>
    <a class="btn ghost" href="{{ route('clubs.create') }}">List Your Club</a>
</section>

<section>
    <h2>Featured Clubs</h2>
    <div class="grid">
        @forelse($featuredClubs as $club)
            <article class="card">
                <h3><a href="{{ route('clubs.show', $club) }}">{{ $club->display_name }}</a></h3>
                <p>{{ $club->city }}, {{ $club->state }}</p>
            </article>
        @empty
            <p>No clubs yet.</p>
        @endforelse
    </div>
</section>
@endsection
