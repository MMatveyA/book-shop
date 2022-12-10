@extends('layouts.master')

@section('title', 'Searching results')

@section('content')
    @isset($authors)
        @foreach ($authors as $author)
            <div>
                <h2>{{ $author->second_name }} {{ $author->first_name }} {{ $author->thrid_name }}</h2>
                <p>{{ $author->birth }}</p>
                <p>{{ $author->death }}</p>
                <p>{{ $author->biography }}</p>
            </div>
        @endforeach
    @endisset
    @empty($authors)
        <p>Not found</p>
    @endempty
@endsection
