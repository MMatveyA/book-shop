@extends('layouts.master')

@section('title', $book->title)

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <img src="{{ $book->image ?? asset('storage/image/image/not_image.jpg') }}" class="img-fluid" alt="{{ $book->title }}">
        </div>
        <div class="col">
            <h2><b>Название: </b>{{ $book->title }}</h2>
            <hr>
            <p>
            <b>Автор: </b><a href="{{ route('author.show', ['author' => $book->author->id,]) }}">{{ $book->author->second_name }}, {{ $book->author->first_name }} {{ $book->author->thrid_name }}</a><br>
            <b>Дата публикации: </b>{{ $book->published }}<br>
            Рейтинг: {{ $book->rating }}<br>
            Цена: {{ $book->price }}<br>
            </p>
            <hr>
            <p>
            <b>О книге:</b><br>
            {{ $book->introduction }}<br>
            </p>
            <form action="{{ route('book.destroy', ['book' => $book->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('book.edit', ['book' => $book->id]) }}" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
    <hr>
    
@endsection
