@extends('layouts.app')

@section('content')
<h1>Admin Panel</h1>
<p>Manage all modules from one place.</p>
<div class="grid">
    @foreach($counts as $label => $count)
        <article class="card"><h3>{{ ucwords(str_replace('_', ' ', $label)) }}</h3><p>{{ $count }}</p></article>
    @endforeach
</div>
<div class="card">
    <h3>Manage Sections</h3>
    <p>
        <a href="{{ route('admin.users.index') }}">Users</a> •
        <a href="{{ route('admin.clubs.index') }}">Clubs</a> •
        <a href="{{ route('admin.coaches.index') }}">Coaches</a> •
        <a href="{{ route('admin.tournaments.index') }}">Tournaments</a> •
        <a href="{{ route('admin.resources.index') }}">Resources</a> •
        <a href="{{ route('admin.news.index') }}">News</a> •
        <a href="{{ route('admin.banners.index') }}">Banners</a> •
        <a href="{{ route('admin.hall-of-fame.index') }}">Hall of Fame</a>
    </p>
</div>
@endsection
