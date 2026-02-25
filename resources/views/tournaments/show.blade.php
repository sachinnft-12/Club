@extends('layouts.app')

@section('content')
<h1>{{ $tournament->title }}</h1>
<p>{{ $tournament->overview }}</p>
<p><strong>Date:</strong> {{ $tournament->start_at }} - {{ $tournament->end_at }}</p>
<p><strong>How to register:</strong> {{ $tournament->register_info }}</p>
@if($tournament->live_link)
    <p><a href="{{ $tournament->live_link }}" target="_blank">Live Link</a></p>
@endif
<h2>Winners</h2>
<p>{{ $tournament->winner_list }}</p>
@endsection
