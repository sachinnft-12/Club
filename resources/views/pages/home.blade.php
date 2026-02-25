@extends('layouts.app')

@section('content')
<section class="hero-wrap">
    <article class="hero-card">
        <span class="pill">Fast • Mobile-first • Premium UX</span>
        <h1>Discover Clubs, Coaches, Players & Tournaments in one place.</h1>
        <p class="sub">Search by location/name, register your club, publish tournaments, and grow with reviews, resources, and sponsored visibility.</p>
        <div class="cta">
            <a class="btn btn-primary" href="{{ route('clubs.index') }}">Locate Clubs</a>
            <a class="btn btn-ghost" href="{{ route('clubs.create') }}">List Your Club</a>
        </div>
        <div class="stats">
            <div class="stat"><b>{{ $counts['clubs'] ?? 0 }}</b><div class="muted">Clubs</div></div>
            <div class="stat"><b>{{ $counts['coaches'] ?? 0 }}</b><div class="muted">Coaches</div></div>
            <div class="stat"><b>{{ $counts['tournaments'] ?? 0 }}</b><div class="muted">Tournaments</div></div>
            <div class="stat"><b>{{ $counts['news'] ?? 0 }}</b><div class="muted">News</div></div>
        </div>
    </article>
    <img src="{{ asset('images/hero-club.svg') }}" alt="ClubScope hero" class="hero-image">
</section>

<div class="section-title">
    <h2>Featured Clubs</h2>
    <a class="muted" href="{{ route('clubs.index') }}">View all →</a>
</div>
<div class="grid">
    @forelse($featuredClubs as $club)
        <article class="card">
            <img src="{{ asset('images/club-card.svg') }}" alt="Club image">
            <span class="tag">{{ $club->status ?? 'active' }}</span>
            <h3><a href="{{ route('clubs.show', $club) }}">{{ $club->display_name }}</a></h3>
            <p class="muted">{{ $club->city }}, {{ $club->state }}</p>
        </article>
    @empty
        <p>No clubs yet.</p>
    @endforelse
</div>

<div class="section-title"><h2>Upcoming Tournaments</h2></div>
<div class="grid">
    @forelse($upcomingTournaments as $tournament)
        <article class="card">
            <img src="{{ asset('images/tournament-card.svg') }}" alt="Tournament image">
            <h3><a href="{{ route('tournaments.show', $tournament) }}">{{ $tournament->title }}</a></h3>
            <p class="muted">{{ optional($tournament->start_at)->format('d M Y, h:i A') }}</p>
        </article>
    @empty
        <p>No upcoming tournaments yet.</p>
    @endforelse
</div>
@endsection
