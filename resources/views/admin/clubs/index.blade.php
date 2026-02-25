@extends('layouts.app')
@section('content')
<h1>Manage Clubs</h1>
@foreach($items as $club)
<div class="card"><strong>{{ $club->display_name }}</strong> - {{ $club->city }} ({{ $club->status }})
<a href="{{ route('admin.clubs.edit', $club) }}">Edit</a>
<form method="POST" action="{{ route('admin.clubs.destroy', $club) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
