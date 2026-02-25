@extends('layouts.app')
@section('content')
<h1>Manage News</h1>
<a class="btn" href="{{ route('admin.news.create') }}">Add News</a>
@foreach($items as $n)
<div class="card"><strong>{{ $n->title }}</strong> ({{ $n->category }})
<a href="{{ route('admin.news.edit', $n) }}">Edit</a>
<form method="POST" action="{{ route('admin.news.destroy', $n) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
