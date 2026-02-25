<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'ClubScope' }}</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
<header class="topbar">
    <div class="container nav">
        <a class="logo" href="{{ route('home') }}">ClubScope</a>
        <nav>
            <a class="nav-link" href="{{ route('clubs.index') }}">Clubs</a>
            <a class="nav-link" href="{{ route('coaches.index') }}">Coaches</a>
            <a class="nav-link" href="{{ route('tournaments.index') }}">Tournaments</a>
            <a class="nav-link" href="{{ route('resources') }}">Resources</a>
            <a class="nav-link" href="{{ route('news') }}">News</a>
            <a class="nav-link" href="{{ route('admin.dashboard') }}">Admin</a>
        </nav>
    </div>
</header>
<main class="container">
    @if(session('status'))
        <div class="alert">{{ session('status') }}</div>
    @endif
    @yield('content')
</main>
<footer class="footer container">
    <a href="{{ route('about') }}">About</a> •
    <a href="{{ route('contact') }}">Contact</a> •
    <a href="{{ route('terms') }}">Terms</a> •
    <a href="{{ route('policy') }}">Policy</a>
</footer>
</body>
</html>
