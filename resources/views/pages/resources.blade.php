@extends('layouts.app')

@section('content')
<div class="section-title"><h1>Resources</h1><p class="muted">YouTube tutorials and accessories links</p></div>
<div class="grid">
    @foreach($resources as $resource)
        <article class="card">
            <img src="{{ asset('images/coach-card.svg') }}" alt="Resource image">
            <span class="tag">{{ strtoupper($resource->type) }}</span>
            <h3>{{ $resource->title }}</h3>
            <p class="muted">{{ $resource->description }}</p>
            <a class="btn btn-ghost" href="{{ $resource->url }}" target="_blank">Open Link</a>
        </article>
    @endforeach
</div>
@endsection
