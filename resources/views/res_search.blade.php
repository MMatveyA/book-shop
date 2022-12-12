@extends('layouts.master')

@section('title', 'Searching results')

@section('content')
<table border="1">
    @if ($authors != NULL)
        @include('layouts.authors')
    @elseif ($books != NULL)
        <tr>
            <th>Название</th>
            <th>Дата публикации</th>
            <th>Оценка</th>
            <th>Краткое описание</th>
            <th>Цена</th>
            <th>Автор</th>
        </tr>
        @forelse ($books as $book)
            <tr>
                <td>{{ $book->title }}</td>
                <td>{{ $book->published }}</td>
                <td>{{ $book->rating }}</td>
                <td>{{ $book->introduction }}</td>
                <td>{{ $book->price }}</td>
                <td>{{ $book->author->second_name }}</td>
            </tr>
        @empty
        @endforelse
    @else
        <p>Not found</p>
    @endif
</table>
@endsection
