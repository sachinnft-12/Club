@extends('layouts.app')

@section('content')
<div class="section-title"><h1>Open Tournaments</h1></div>
<div class="grid">
    @foreach($tournaments as $tournament)
        <article class="card">
            <img src="{{ asset('images/tournament-card.svg') }}" alt="Tournament image">
            <h3><a href="{{ route('tournaments.show', $tournament) }}">{{ $tournament->title }}</a></h3>
            <p class="muted">{{ optional($tournament->club)->display_name }}</p>
            <p class="muted">{{ optional($tournament->start_at)->format('d M Y, h:i A') }}</p>
        </article>
    @endforeach
</div>
{{ $tournaments->links() }}
@endsection
