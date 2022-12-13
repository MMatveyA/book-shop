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
@endsection
