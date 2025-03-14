<?php

use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\ImagenController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuenta',[RegisterController::class,'index'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class,'store'])->name('register');

Route::get('/login',[LoginController::class,'index'])->name('login');
Route::post('/login',[LoginController::class,'store']);

Route::post('/logout',[LogoutController::class,'store'])->name('logout');

Route::get('/{user:username}',[PostController::class,'index'])->name('posts.index');
Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
Route::post('/posts',[PostController::class,'store'])->name('posts.store');
Route::get('/{user:username}/posts/{post}',[PostController::class,'show'])->name('posts.show');

Route::post('/{user:username}/posts/{post}', [ComentarioController::class, 'store'])->name('comentarios.store');

Route::post('/imagenes',[ImagenController::class,'store'])->name('imagenes.store');
