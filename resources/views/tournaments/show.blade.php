@extends('layouts.app')

@section('content')
<div class="hero-wrap">
    <article class="hero-card">
        <span class="pill">Tournament</span>
        <h1>{{ $tournament->title }}</h1>
        <p class="sub">{{ $tournament->overview }}</p>
        <p><strong>Date:</strong> {{ optional($tournament->start_at)->format('d M Y, h:i A') }} - {{ optional($tournament->end_at)->format('d M Y, h:i A') }}</p>
        <p><strong>How to register:</strong> {{ $tournament->register_info }}</p>
        @if($tournament->live_link)
            <a class="btn btn-primary" href="{{ $tournament->live_link }}" target="_blank">Watch Live</a>
        @endif
    </article>
    <img src="{{ asset('images/tournament-card.svg') }}" alt="Tournament poster" class="hero-image">
</div>

<div class="section-title"><h2>Winner List</h2></div>
<article class="card">{{ $tournament->winner_list ?: 'Winners will be published after tournament completion.' }}</article>
@endsection
