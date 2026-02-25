@extends('layouts.app')

@section('content')
<h1>Resources</h1>
<div class="grid">
    @foreach($resources as $resource)
        <article class="card">
            <h3>{{ $resource->title }}</h3>
            <p>{{ $resource->description }}</p>
            <a href="{{ $resource->url }}" target="_blank">Open Link</a>
        </article>
    @endforeach
</div>
@endsection
