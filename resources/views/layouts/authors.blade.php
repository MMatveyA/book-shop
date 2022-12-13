    <div class="row">
        @foreach ($authors as $author)
            <div class="col-lg-3 col-sm-6">
                <div class="card text-center border-primary mb-5" style="width: 18rem">
                    <img class="card-image-top" src="{{ $author->thumb != '' ? $author->thumb : asset('storage/image/thumb/not_image.jpg') }}" alt="{{ $author->second_name }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $author->second_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-mutted">{{ $author->first_name }} {{ $author->thrid_name }}</h6>
                        <a href="{{ route('author.show', ['author' => $author->id]) }}" class="btn btn-primary">Подробнее</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
