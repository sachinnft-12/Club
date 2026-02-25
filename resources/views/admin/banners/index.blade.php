@extends('layouts.app')
@section('content')
<h1>Manage Banners</h1>
<a class="btn" href="{{ route('admin.banners.create') }}">Add Banner</a>
@foreach($items as $b)
<div class="card"><strong>{{ $b->title }}</strong> - {{ $b->sponsor_name }}
<a href="{{ route('admin.banners.edit', $b) }}">Edit</a>
<form method="POST" action="{{ route('admin.banners.destroy', $b) }}">@csrf @method('DELETE') <button>Delete</button></form>
</div>
@endforeach
{{ $items->links() }}
@endsection
