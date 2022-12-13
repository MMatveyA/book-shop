@extends('layouts.master')

@section('title', $author->second_name )

@section('content')
    <div class="row align-items-center">
        <div class="col">
            <img src="{{ $author->image }}" class="img-fluid">
        </div>
        <div class="col">
            <h2><b>Имя: </b>{{ $author->first_name }}</h2>
            <h2><b>Фамилия: </b>{{ $author->second_name }}</h2>
            @if ($author->thrid_name != NULL)
                <h3><b>Отчество: </b>{{ $author->thrid_name }}</h2>
            @endif
            <hr>
            <p>
            Дата рождения: {{ $author->birth }}<br>
            @if ($author->death != NULL)
                Дата смерти: {{ $author->death }}<br>
            @else
                Дата смерти: ----------
            @endif
            </p>
            <hr>
            <p>
            <b>Об авторе:</b><br>
            {{ $author->biography }}<br>
            </p>
            <form action="{{ route('author.destroy', ['author' => $author->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <a href="{{ route('author.edit', ['author' => $author->id]) }}" class="btn btn-primary">Редактировать</a>
                <button type="submit" class="btn btn-danger">Удалить</button>
            </form>
        </div>
    </div>
    <hr>
    <div class="row">
        @foreach ($author->books as $book)
            <div class="col-lg-3 col-sm-6">
                <div class="card text-center border-primary mb5" style="width: 18rem">
                    <img class="card-image-top" src="{{ $book->thumb ?? asset('storage/image/thumb/not_image.jpg') }}" alt="{{ $book->title }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <h6 class="card-subtitle mb-2 text-mutted">
                            {{ $book->author->second_name }} 
                            {{ $book->author->first_name }}
                            {{ $book->author->thrid_name }}
                        </h6>
                        <a class="btn btn-primary" href="{{ route('book.show', ['book' => $book->id]) }}">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
