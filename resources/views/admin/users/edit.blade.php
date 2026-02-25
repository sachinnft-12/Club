@extends('layouts.app')
@section('content')
<h1>Edit User</h1>
<form method="POST" action="{{ route('admin.users.update', $user) }}" class="stack">@csrf @method('PUT')
<input name="name" value="{{ $user->name }}" required>
<input name="email" value="{{ $user->email }}" required>
<select name="role"><option>admin</option><option>club_owner</option><option>coach</option><option>player</option></select>
<button class="btn">Save</button></form>
@endsection
