<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function() {
    Route::get('/posts', [PostController::class, 'index'])
        ->name('posts.index');
         
    Route::get('/posts/{post}', [PostController::class, 'show'])
        ->name('posts.show');

    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

        Route::get('/posts/store', [PostController::class, 'store'])
        ->name('posts.store');   

    Route::get('posts{post}/edit', [PostController::class, 'edit'])
        ->name('posts.edit');
        
    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->name('posts.update');

    Route::get('/posts/{post}/delete', [PostController::class, 'destroy'])
        ->name('posts.delete');

    Route::resource('photos', PhotoController::class);
});
require __DIR__.'/auth.php';
