@extends('layouts.app')

@section('content')
<h1>Coaches & Academies</h1>
<div class="grid">
    @foreach($coaches as $coach)
        <article class="card">
            <h3><a href="{{ route('coaches.show', $coach) }}">{{ $coach->user->name }}</a></h3>
            <p>{{ $coach->headline }}</p>
        </article>
    @endforeach
</div>
{{ $coaches->links() }}
@endsection
