@extends('layouts.master')

@section('title', 'Создание книги')

@section('content')
    <h1>Добавление автора</h1>
    <form action="{{ route('book.update', ['book' => $book->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="title" class="form-label">Название</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $book->title }}" required><br>
        </div>
        <select id="author_id" class="form-selected" name="author_id">
            @foreach($authors as $author)
                @if ($book->author->id != $author->id)
                    <option value="{{ $author->id }}">{{ $author->second_name }}, {{ $author->first_name }} {{ $author->thrid_name }}</option>
                @else
                    <option selected value="{{ $author->id }}">{{ $author->second_name }}, {{ $author->first_name }} {{ $author->thrid_name }}</option>
                @endif
            @endforeach
        </select>
        <div class="form-group">
            <label for="published" class="form-label">Дата публикации</label>
            <input type="date" class="form-control" id="published" name="published" value="{{ $book->published }}" required><br>
        </div>
        <div class="form-group">
            <label for="introduction" class="form-label">Предисловие</label>
            <textarea class="form-control" id="introduction" name="introduction" rows="7" required>{{ $book->introduction }}</textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Фотография</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*" value="{{ $book->source }}"><br>
        </div>
        <div class="form-group mb-3">
            <label class="form-label" for="price">Цена</label>
            <input id="price" class="form-control" type="number" name="price" value="{{ $book->price }}">
        </div>
        <div class="mb-3">
            <input type="reset" class="btn btn-danger" value="Сбросить">
            <input type="submit" class="btn btn-success" value="Редактировать">
        </div>
    </form>
@endsection
