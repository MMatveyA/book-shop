<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;

class HomeController extends Controller
{
    /*
     * Домашняя страница
     *
     * @return view
     */
    public function home ()
    {
        return view('home');
    }

    /*
     * Поиск книги
     *
     * @return view
     */
    public function search (Request $request)
    {
        $authors = Author::where(function ($query) use ($request) {
            $query->where('first_name', '=', $request->input('name'))
                  ->orWhere('second_name', '=', $request->input('name'))
                  ->orWhere('thrid_name', '=', $request->input('name'));
        })->orderBy('second_name')
            ->get();

        if ($authors->count() == 0)
        {
            $authors = NULL;
        }

        return view('res_search', [
            'authors' => $authors,
        ]);
    }
}
