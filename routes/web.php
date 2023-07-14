<?php

use App\Http\Controllers\WordController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/words', [WordController::class, 'randomWords'])->name('words');
// Route::post('/words', [WordController::class, 'randomWords'])->name('words');
Route::post('/translations', [WordController::class, 'translations'])->name('translations');
