@extends('layouts.app')

@section('content')
<h1>News & Events</h1>
@foreach($items as $item)
    <article class="card">
        <h3>{{ $item->title }}</h3>
        <p>{{ $item->summary }}</p>
    </article>
@endforeach
{{ $items->links() }}
@endsection
