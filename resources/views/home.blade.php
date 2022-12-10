@extends('layouts.master')

@section('title', 'Home')

@section('content')
<form action="{{ route('home') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Enter title book">
    <button type="submit">SEARCH</button>
</form>
@endsection
