@extends('layouts.app')

@section('content')
<div class="section-title"><h1>Coaches & Academies</h1></div>
<div class="grid">
    @foreach($coaches as $coach)
        <article class="card">
            <img src="{{ asset('images/coach-card.svg') }}" alt="Coach image">
            <h3><a href="{{ route('coaches.show', $coach) }}">{{ $coach->user->name }}</a></h3>
            <p class="muted">{{ $coach->headline }}</p>
        </article>
    @endforeach
</div>
{{ $coaches->links() }}
@endsection
