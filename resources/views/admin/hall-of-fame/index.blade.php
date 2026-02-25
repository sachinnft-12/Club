@extends('layouts.app')
@section('content')
<h1>Manage Hall of Fame</h1>
<a class="btn" href="{{ route('admin.hall-of-fame.create') }}">Add Entry</a>
@foreach($items as $e)
<div class="card"><strong>#{{ $e->rank_position }} {{ $e->name }}</strong> - {{ $e->achievement }}
<a href="{{ route('admin.hall-of-fame.edit', $e) }}">Edit</a>
<form method="POST" action="{{ route('admin.hall-of-fame.destroy', $e) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
