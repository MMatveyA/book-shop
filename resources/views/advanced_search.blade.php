@extends('layouts.master')

@section('title', 'Advanced search')

@section('content')
    <h2>Advanced search</h2>
    <form action="" method="POST">
        @csrf
        <p><b>Искать по: </b><br>
        <input type="radio" name="type" value="author" checked> Автору<br>
        <input type="radio" name="type" value="book"> Названия книги<br>
        <input type="text" name="name" required><br>
        <input type="submit" value="Search"><br>
        </p>
    </form>
@endsection
