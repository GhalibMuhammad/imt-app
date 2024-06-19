<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\ImtController;

Route::get('/authenticate', [SiswaController::class, 'authenticate']);

Route::prefix('/users')->name('users.')->group(function() {
    Route::get('/', [SiswaController::class, 'index'])->name('index');
});

Route::get('/', [ImtController::class, 'index'])->name('index'); 
Route::post('/', [ImtController::class, 'calculateImt'])->name('calculateImt'); 
Route::get('/home', [ImtController::class, 'home'])->name('home');
Route::get('/rekomendasi-makanan', [ImtController::class, 'showRecommendedFood'])->name('recommendedFood');
Route::get('/rekomendasi-olahraga', [ImtController::class, 'showRecommendedSport'])->name('recommendedSport');


