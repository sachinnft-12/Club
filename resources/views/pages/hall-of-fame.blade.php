@extends('layouts.app')

@section('content')
<h1>Hall of Fame</h1>
@foreach($entries as $entry)
    <article class="card">
        <h3>#{{ $entry->rank_position }} {{ $entry->name }}</h3>
        <p>{{ $entry->achievement }} ({{ $entry->country }})</p>
    </article>
@endforeach
{{ $entries->links() }}
@endsection
