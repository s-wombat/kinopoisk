<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(CategoryController::class)->group(function () {
    Route::get('/categories', 'index')->name('categories');
    Route::get('/thebest', 'thebest')->name('thebest');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::controller(ProfileController::class)->name('profile.')->group(function() {
        Route::get('/profile', 'edit')->name('edit');
        Route::patch('/profile', 'update')->name('update');
        Route::delete('/profile', 'destroy')->name('destroy');
    });

    Route::resources([
        'users' => UserController::class,
        'films' => FilmController::class,
    ]);
    Route::controller(FilmController::class)->name('image.')->group(function () {
        Route::post('/upload', 'upload')->name('upload');
    });
    Route::controller(IndexController::class)->name('main.')->group(function () {
        Route::get('/', 'index')->name('home');
        Route::get('/film/{id}', 'show')->name('film');
    });
    Route::controller(CommentController::class)->name('comments.')->group(function () {
        Route::post('/film/{id}/comment', 'store')->name('store');
        Route::get('/film/{id}/comments', 'index')->name('comments');
    });
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
