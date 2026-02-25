@extends('layouts.app')

@section('content')
<div class="section-title"><h1>News & Events</h1></div>
<div class="grid">
@foreach($items as $item)
    <article class="card">
        <img src="{{ asset('images/tournament-card.svg') }}" alt="News image">
        <span class="tag">{{ $item->category }}</span>
        <h3>{{ $item->title }}</h3>
        <p class="muted">{{ $item->summary }}</p>
    </article>
@endforeach
</div>
{{ $items->links() }}
@endsection
