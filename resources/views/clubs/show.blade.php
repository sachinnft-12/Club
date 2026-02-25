@extends('layouts.app')

@section('content')
<div class="hero-wrap">
    <article class="hero-card">
        <span class="pill">Club Profile</span>
        <h1>{{ $club->display_name }}</h1>
        <p class="sub">{{ $club->description }}</p>
        <p><strong>Timings:</strong> {{ $club->open_time ?? 'N/A' }} - {{ $club->close_time ?? 'N/A' }}</p>
        <p><strong>Location:</strong> {{ $club->address ?? 'N/A' }}, {{ $club->city }}, {{ $club->state }}</p>
    </article>
    <img src="{{ asset('images/club-card.svg') }}" alt="Club gallery" class="hero-image">
</div>

<div class="section-title"><h2>Reviews</h2></div>
<div class="grid">
@forelse($club->reviews as $review)
    <article class="card">
        <span class="tag">{{ $review->rating }}/5</span>
        <p>{{ $review->comment }}</p>
    </article>
@empty
    <p>No reviews yet.</p>
@endforelse
</div>
@endsection
