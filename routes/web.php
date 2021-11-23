<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/articles', [ArticlesController::class, 'index'])->name('articles');
Route::get('/articles/search', [ArticlesController::class, 'search'])->name('articles.search');
Route::get('/articles/create', [ArticlesController::class, 'create'])->name('articles.create');
Route::post('/articles/save', [ArticlesController::class, 'save'])->name('articles.save');
Route::get('/articles/{article}/edit', [ArticlesController::class, 'edit'])->name('articles.edit');
Route::get('/articles/{article}/show', [ArticlesController::class, 'show'])->name('articles.show');
Route::get('/articles/{article}/update', [ArticlesController::class, 'update'])->name('articles.update');
Route::get('/articles/{article}/delete', [ArticlesController::class, 'destroy'])->name('articles.delete');

// Route::get('/articles', function () { return view('articles.index'); })->name('articles');