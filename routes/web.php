<?php

use Illuminate\Support\Facades\Route;

// Контроллеры маршрутов
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [HomeController::class, 'home'])->name('home');
Route::post('/', [SearchController::class, 'search']);

Route::get('/advanced_search', [SearchController::class, 'adv_search'])->name('adv_search');
Route::post('/advanced_search', [SearchController::class, 'adv_search']);

Route::resources([
    '/author' => AuthorController::class,
    '/book' => BookController::class,
]);
