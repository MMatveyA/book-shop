<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

use App\Models\Author;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('book.index', [
            'books' => Book::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create', [
            'authors' => Author::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $source = $data['image'] ?? NULL;
        if ($source)
        {
            $ext = str_replace('jpeg', 'jpg', $source->extension());
            // Уникальное имя файла
            $name = md5(uniqid());
            Storage::putFileAs('public/image/source/author', $source, $name.'.'.$ext);
            $data['source'] = Storage::url('public/image/source/author/'.$name.'.jpg');
            // Изображение для страницы автора с размером 1200х800б качество 100%
            $image = Image::make($source)
                ->fit(400, 400)
                ->encode('jpg', 100);
            Storage::put('public/image/image/author/'.$name.'.jpg', $image);
            $image->destroy();
            $data['image'] = Storage::url('public/image/image/author/'.$name.'.jpg');
            // Изображение для страницы со списком авторов
            $thumb = Image::make($source)
                ->fit(200, 200)
                ->encode('jpg', 100);
            Storage::put('public/image/thumb/author/'.$name.'.jpg', $thumb);
            $thumb->destroy();
            $data['thumb'] = Storage::url('public/image/thumb/author/'.$name.'.jpg');
        }

        Book::create($data);

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('book.show', [
            'book' => Book::find($id),
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('book.edit', [
            'authors' => Author::All(),
            'book' => Book::findOrFail($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book = Book::find($id);

        $data = $request->all();

        $book->title = $data['title'];
        $book->published = $data['published'];
        $book->introduction = $data['introduction'];
        $book->price = $data['price'];
        $book->author_id = $data['author_id'];
        $source = $data['image'] ?? NULL;
        if ($source)
        {
            Storage::delete([$book->source, $book->image, $book->thumb]);

            $ext = str_replace('jpeg', 'jpg', $source->extension());
            // Уникальное имя файла
            $name = md5(uniqid());
            Storage::putFileAs('public/image/source/book', $source, $name.'.'.$ext);
            // Изображение для страницы автора с размером 1200х800б качество 100%
            $image = Image::make($source)
                ->fit(400, 400)
                ->encode('jpg', 100);
            Storage::put('public/image/image/book/'.$name.'.jpg', $image);
            $image->destroy();
            $book->source = Storage::url('public/image/source/book/'.$name.'.jpg');
            $book->image = Storage::url('public/image/image/book/'.$name.'.jpg');
            // Изображение для страницы со списком авторов
            $thumb = Image::make($source)
                ->fit(200, 200)
                ->encode('jpg', 100);
            Storage::put('public/image/thumb/book/'.$name.'.jpg', $thumb);
            $thumb->destroy();
            $book->thumb = Storage::url('public/image/thumb/book/'.$name.'.jpg');
        }

        $book->save();

        return redirect()->route('book.index');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Book::destroy($id);

        return redirect()->route('book.index');
    }
}
