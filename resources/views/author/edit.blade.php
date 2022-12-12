@extends('layouts.master')

@section('title', $author->second_name)

@section('content')
    <form action="{{ route('author.update', ['author' => $author->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <input type="text" name="first_name" value="{{ $author->first_name }}" required><br>
        <input type="text" name="second_name" value="{{ $author->second_name }}" required><br>
        <input type="text" name="thrid_name" value="{{ $author->thrid_name }}" required><br>
        <input type="date" name="birth" value="{{ $author->birth }}" required><br>
        <input type="date" name="death" value="{{ $author->death }}" required><br>
        <textarea name="biography" cols="40" rows="5" required>{{ $author->biography }}</textarea><br>
        <input type="submit" value="edit">
    </form>
@endsection
