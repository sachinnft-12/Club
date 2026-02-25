@extends('layouts.app')
@section('content')
<h1>Manage Resources</h1>
<a class="btn" href="{{ route('admin.resources.create') }}">Add Resource</a>
@foreach($items as $r)
<div class="card"><strong>{{ $r->title }}</strong> ({{ $r->type }})
<a href="{{ route('admin.resources.edit', $r) }}">Edit</a>
<form method="POST" action="{{ route('admin.resources.destroy', $r) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
