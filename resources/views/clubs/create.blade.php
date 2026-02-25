@extends('layouts.app')

@section('content')
<h1>Register Your Club</h1>
<form method="POST" action="{{ route('clubs.store') }}" class="stack">
    @csrf
    <input name="display_name" placeholder="Club Name" required>
    <textarea name="description" placeholder="Overview"></textarea>
    <input name="city" placeholder="City" required>
    <input name="state" placeholder="State" required>
    <input name="country" placeholder="Country" value="India" required>
    <input name="address" placeholder="Address">
    <input name="phone" placeholder="Phone">
    <input name="email" placeholder="Email">
    <input name="website" placeholder="Website">
    <button class="btn" type="submit">Submit Club</button>
</form>
@endsection
