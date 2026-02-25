@extends('layouts.app')
@section('content')
<h1>Manage Coaches</h1>
@foreach($items as $coach)
<div class="card"><strong>{{ $coach->user->name ?? 'N/A' }}</strong> - {{ $coach->headline }}
<a href="{{ route('admin.coaches.edit', $coach) }}">Edit</a>
<form method="POST" action="{{ route('admin.coaches.destroy', $coach) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
