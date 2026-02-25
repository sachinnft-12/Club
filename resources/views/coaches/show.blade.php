@extends('layouts.app')

@section('content')
<h1>{{ $coach->user->name }}</h1>
<p>{{ $coach->headline }}</p>
<p>{{ $coach->bio }}</p>
<p>{{ $coach->achievements }}</p>
@endsection
