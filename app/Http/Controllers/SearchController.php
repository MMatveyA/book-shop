<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class SearchController extends Controller
{
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

    /*
     * Расширенный поиск
     *
     * @return view
     */
    public function adv_search (Request $request)
    {
        if ($request->isMethod('POST'))
        {
            $authors = NULL;
            $books = NULL;
            if ($request->input('type') == 'author')
            {
                $authors = Author::where(function ($query) use ($request) {
                    $query->where('first_name', '=', $request->input('name'))
                          ->orWhere('second_name', '=', $request->input('name'))
                          ->orWhere('thrid_name', '=', $request->input('name'));
                })->orderBy('second_name')
                    ->get();
            }
            else
            {
                $books = Book::where('title', '=', $request->input('name'))->orderBy('title')
                    ->get();
            }
            return view('res_search', [
                'authors' => $authors,
                'books' => $books,
            ]);
        }
        return view('advanced_search');
    }
}
