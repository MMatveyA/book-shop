@extends('layouts.master')

@section('title', $author->second_name)

@section('content')
    <h1>Редактирование автора</h1>
    <form action="{{ route('author.update', ['author' => $author->id]) }}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="first_name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="first_name" name="first_name" value="{{ $author->first_name }}" required><br>
        </div>
        <div class="form-group">
            <label for="second_name" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="second_name" name="second_name" value="{{ $author->second_name }}" required><br>
        </div>
        <div class="form-group">
            <label for="thrid_name" class="form-label">Отчество (не обязательно)</label>
            <input type="text" class="form-control" id="thrid_name" name="thrid_name" value="{{ $author->thrid_name }}"><br>
        </div>
        <div class="form-group">
            <label for="birth" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="birth" name="birth" value="{{ $author->birth }}" required><br>
        </div>
        <div class="form-group">
            <label for="death" class="form-label">Дата смерти</label>
            <input type="date" class="form-control" id="death" name="death" value="{{ $author->death }}" required><br>
        </div>
        <div class="form-group">
            <label for="biography" class="form-label">Краткая биография</label>
            <textarea class="form-control" id="biography" name="biography" rows="3" required>{{ $author->biography }}</textarea><br>
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Фотография</label>
            <input class="form-control" type="file" id="image" name="image" src="{{ $author->image }}" accept="image/*"><br>
        </div>
        <div class="mb-3">
            <input type="reset" class="btn btn-danger" value="Сбросить">
            <input type="submit" class="btn btn-success" value="Редактировать">
        </div>
    </form>
@endsection
