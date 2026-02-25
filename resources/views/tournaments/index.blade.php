@extends('layouts.app')

@section('content')
<h1>Open Tournaments</h1>
<div class="grid">
    @foreach($tournaments as $tournament)
        <article class="card">
            <h3><a href="{{ route('tournaments.show', $tournament) }}">{{ $tournament->title }}</a></h3>
            <p>{{ optional($tournament->club)->display_name }}</p>
            <p>{{ $tournament->start_at }}</p>
        </article>
    @endforeach
</div>
{{ $tournaments->links() }}
@endsection
