<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
Route::get('/list', function (){
    return view('list');
})->middleware(['auth'])->name('list');
*/

Route::get('/list', [BookController::class, 'listBooks'])->middleware(['auth'])->name('list');

Route::post('/list', [BookController::class, 'saveBook'])->middleware(['auth'])->name('save');

Route::delete('/destroy/{book}', [BookController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('destroy');

Route::get('/authors', [App\Http\Controllers\AuthorController::class, 'listAuthors'])->middleware(['auth'])->name('authors');

Route::post('/authors', [AuthorController::class, 'saveAuthor'])->middleware(['auth'])->name('saveAuthor');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';