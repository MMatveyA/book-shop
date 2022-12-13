@extends('layouts.master')

@section('title', 'Книги')

@section('content')
    <div class="row">
        @foreach ($books as $book)
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
