<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;

Route::get('/', [ArticleController::class, 'home'])->name('home');
Route::get('/actualites', [ArticleController::class, 'index'])->name('articles.index');
Route::get('/actualites/{slug}', [ArticleController::class, 'show'])->name('articles.show');
