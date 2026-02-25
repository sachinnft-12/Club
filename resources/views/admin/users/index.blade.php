@extends('layouts.app')
@section('content')
<h1>Manage Users</h1>
@foreach($items as $u)
<div class="card"><strong>{{ $u->name }}</strong> ({{ $u->email }}) - {{ $u->role }}
<a href="{{ route('admin.users.edit', $u) }}">Edit</a>
<form method="POST" action="{{ route('admin.users.destroy', $u) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
