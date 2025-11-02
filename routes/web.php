<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Post;
use App\Http\Controllers\Admin;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('posts')->group(function () {
    Route::get('/', Post\IndexController::class)->name('post.index');
    Route::get('/create', Post\CreateController::class)->name('post.create');
    Route::post('/store', Post\StoreController::class)->name('post.store');
    Route::get('/{post}', Post\ShowController::class)->name('post.show');
    Route::get('/{post}/edit', Post\EditController::class)->name('post.edit');
    Route::patch('/{post}', Post\UpdateController::class)->name('post.update');
    Route::delete('/{post}', Post\DestroyController::class)->name('post.destroy');
});

Route::prefix('admin')->group(function () {
    Route::get('/', Admin\IndexController::class)->name('admin.index');

    Route::prefix('post')->group(function () {
        Route::get('/', Admin\Post\IndexController::class)->name('admin.post.index');
    });
});

Route::get('/posts/update', [PostController::class, 'update']);
Route::get('/posts/delete', [PostController::class, 'delete']);
Route::get('/posts/first_or_create', [PostController::class, 'firstOrCreate']);
Route::get('/posts/update_or_create', [PostController::class, 'updateOrCreate']);

Route::get('/main', [MainController::class, 'index'])->name('main.index');
Route::get('/contacts', [ContactController::class, 'index'])->name('contact.index');
Route::get('/about', [AboutController::class, 'index'])->name('about.index');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
