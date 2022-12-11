@extends('layouts.master')

@section('title', 'Searching results')

@section('content')
<table border="1">
    @if ($authors != NULL)
        <tr>
            <th>Имя фамилия отчество</th>
            <th>Дата рождения</th>
            <th>Дата смерти</th>
            <th>Краткая биография</th>
        </tr>
        @forelse ($authors as $author)
            <tr bordercolor="#000">
                <td>{{ $author->second_name }} {{ $author->first_name }} {{ $author->thrid_name }}</td>
                <td>{{ $author->birth }}</td>
                <td>{{ $author->death }}</td>
                <td>{{ $author->biography }}</td>
            </tr>
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
</table>
@endsection
