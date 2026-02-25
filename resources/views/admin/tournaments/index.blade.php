@extends('layouts.app')
@section('content')
<h1>Manage Tournaments</h1>
@foreach($items as $t)
<div class="card"><strong>{{ $t->title }}</strong> - {{ $t->status }}
<a href="{{ route('admin.tournaments.edit', $t) }}">Edit</a>
<form method="POST" action="{{ route('admin.tournaments.destroy', $t) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
