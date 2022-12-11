@extends('layouts.master')

@section('title', 'Searching results')

@section('content')
    @if ($authors != NULL)
        @forelse ($authors as $author)
            <div>
                <h2>{{ $author->second_name }} {{ $author->first_name }} {{ $author->thrid_name }}</h2>
                <p>{{ $author->birth }}</p>
                <p>{{ $author->death }}</p>
                <p>{{ $author->biography }}</p>
            </div>
        @empty
        @endforelse
    @elseif ($books != NULL)
        @forelse ($books as $book)
            <div>
                <h2>{{ $book->title }}</h2>
                <p>{{ $book->published }}</p>
                <p>{{ $book->rating }}</p>
                <p>{{ $book->introduction }}</p>
                <p>{{ $book->price }}</p>
                <p>{{ $book->author->second_name }}</p>
            </div>
        @empty
        @endforelse
    @else
        <p>Not found</p>
    @endif
@endsection
