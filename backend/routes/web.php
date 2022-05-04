<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/articles', [ArticleController::class, 'showAll'])->name('.articles.index');
//Route::get('/article/create/', [ArticleController::class, 'create'])->name('articles.create');
//Route::get('article/{id}', [ArticleController::class, 'show'])->name('article.show');
//Route::post('article', [ArticleController::class, 'store'])->name('article.store');
//Route::get('article/edit/{id}' ,[ArticleController::class, 'edit'])->name('article.edit');
//Route::patch('article/{id}', [ArticleController::class, 'update'])->name('article.update');
//Route::delete('article/{id}', [ArticleController::class, 'destroy'])->name('article.delete');
//
//
//Auth::routes();
//
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
