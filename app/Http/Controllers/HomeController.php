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
}
