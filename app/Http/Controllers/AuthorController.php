<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('author.index', [
            'authors' => Author::orderBy('second_name')
                ->orderBy('first_name')
                ->orderBy('thrid_name')
                ->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('author.create');
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

        $source = $data['image'];
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



        Author::create($data);

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('author.author', [
            'author' => Author::findOrFail($id)
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
        return view('author.edit', [
            'author' => Author::findOrFail($id),
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
        $author = Author::find($id);

        $data = $request->all();

        $author->first_name = $data['first_name'];
        $author->second_name = $data['second_name'];
        $author->thrid_name = $data['thrid_name'];
        $author->birth = $data['birth'];
        $author->death = $data['death'];
        $author->biography = $data['biography'];
        $source = $data['image'];
        if ($source)
        {
            Storage::delete([$author->source, $author->image, $author->thumb]);

            $ext = str_replace('jpeg', 'jpg', $source->extension());
            // Уникальное имя файла
            $name = md5(uniqid());
            Storage::putFileAs('public/image/source/author', $source, $name.'.'.$ext);
            // Изображение для страницы автора с размером 1200х800б качество 100%
            $image = Image::make($source)
                ->fit(400, 400)
                ->encode('jpg', 100);
            Storage::put('public/image/image/author/'.$name.'.jpg', $image);
            $image->destroy();
            $author->image = Storage::url('public/image/image/author/'.$name.'.jpg');
            // Изображение для страницы со списком авторов
            $thumb = Image::make($source)
                ->fit(200, 200)
                ->encode('jpg', 100);
            Storage::put('public/image/thumb/author/'.$name.'.jpg', $thumb);
            $thumb->destroy();
            $author->thumb = Storage::url('public/image/thumb/author/'.$name.'.jpg');
        }

        $author->save();

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Author::destroy($id);

        return redirect()->route('author.index');
    }
}
