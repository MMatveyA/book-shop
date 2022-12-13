@extends('layouts.master')

@section('title', 'Создание автора')

@section('content')
    <h1>Добавление автора</h1>
    <form action="{{ route('author.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="first_name" class="form-label">Имя</label>
            <input type="text" class="form-control" id="first_name" name="first_name" required><br>
        </div>
        <div class="form-group">
            <label for="second_name" class="form-label">Фамилия</label>
            <input type="text" class="form-control" id="second_name" name="second_name" required><br>
        </div>
        <div class="form-group">
            <label for="thrid_name" class="form-label">Отчество (не обязательно)</label>
            <input type="text" class="form-control" id="thrid_name" name="thrid_name"><br>
        </div>
        <div class="form-group">
            <label for="birth" class="form-label">Дата рождения</label>
            <input type="date" class="form-control" id="birth" name="birth" required><br>
        </div>
        <div class="form-group">
            <label for="death" class="form-label">Дата смерти</label>
            <input type="date" class="form-control" id="death" name="death" required><br>
        </div>
        <div class="form-group">
            <label for="biography" class="form-label">Краткая биография</label>
            <textarea class="form-control" id="biography" name="biography" rows="7" required></textarea><br>
        </div>
        <div class="form-group mb-3">
            <label for="image" class="form-label">Фотография</label>
            <input class="form-control" type="file" id="image" name="image" accept="image/*"><br>
        </div>
        <div class="mb-3">
            <input type="reset" class="btn btn-danger" value="Сбросить">
            <input type="submit" class="btn btn-success" value="Редактировать">
        </div>
    </form>
@endsection
