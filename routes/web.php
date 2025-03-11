<?php

use App\Http\Controllers\auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('principal');
});

Route::get('/crear-cuenta',[RegisterController::class,'index'])->name('register');
Route::post('/crear-cuenta',[RegisterController::class,'store'])->name('register');
