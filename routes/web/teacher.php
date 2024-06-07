<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth:teacher', 'splade'])->prefix('teacher')->name('teacher.')->group(function () {
    Route::get('/dashboard', function () {
        
    })->name('dashboard');

});