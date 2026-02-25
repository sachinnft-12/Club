@extends('layouts.app')

@section('content')
<h1>{{ $club->display_name }}</h1>
<p>{{ $club->description }}</p>
<p><strong>Timings:</strong> {{ $club->open_time }} - {{ $club->close_time }}</p>
<p><strong>Location:</strong> {{ $club->address }}, {{ $club->city }}, {{ $club->state }}</p>
<h2>Reviews</h2>
@foreach($club->reviews as $review)
    <article class="card">
        <strong>{{ $review->rating }}/5</strong>
        <p>{{ $review->comment }}</p>
    </article>
@endforeach
@endsection
