<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AdminControllers\{
    AdminController,
    SubjectController,
    StudentController,
    MainController,
    TeacherController,
    GroupController,
    GroupStundetController
};


Route::middleware(['auth:admin', 'splade'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/logout', [LoginController::class, 'distroy'])->name('logout');

    Route::get('/dashboard', [MainController::class, 'index'])->name('dashboard');

    Route::resource('subjects', SubjectController::class);

    Route::resource('students', StudentController::class);

    Route::resource('admins', AdminController::class);
    Route::put('admins/{admin}/edit/password-reset', [AdminController::class, 'update_password'])
        ->name('admins.update.password');


    Route::resource('teachers', TeacherController::class);
    Route::put(
        'admins/{teacher}/edit/password-reset',
        [AdminController::class, 'update_password']
    )->name('teachers.update.password');


    Route::resource('groups', GroupController::class);
    Route::resource('groups.students', GroupStundetController::class);


    // ------------------------------------------------------------------
    // Registers routes to support the interactive components...
    Route::spladeWithVueBridge();

    // Registers routes to support password confirmation in Form and Link components...
    Route::spladePasswordConfirmation();

    // Registers routes to support Table Bulk Actions and Exports...
    Route::spladeTable();

    // Registers routes to support async File Uploads with Filepond...
    Route::spladeUploads();

    // Registers routes to support table components
    Route::spladeTable();
});

