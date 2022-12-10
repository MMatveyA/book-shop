<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('home');
    }
}
