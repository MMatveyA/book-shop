@extends('layouts.master')

@section('title', 'Создание автора')

@section('content')
    <form action="{{ route('author.store') }}" method="POST">
        @csrf
        <input type="text" name="first_name" placeholder="name" required><br>
        <input type="text" name="second_name" placeholder="second_name" required><br>
        <input type="text" name="thrid_name" placeholder="thrid_name"><br>
        <input type="date" name="birth" placeholder="Date birth" required><br>
        <input type="date" name="death" placeholder="Date death"><br>
        <textarea name="biography" placeholder="biography" cols="40" rows="5" required></textarea><br>
        <input type="submit" value="Add"><br>
    </form>
@endsection
