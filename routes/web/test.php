<?php 


# This Subject
	Route::controller(SubjectController::class)->name('subject.')->prefix('subjects')->group(function () {
		Route::get('/', 'index')->name('index');
    Route::get('/{id}/show', 'show')->where('id', '[0-9]+')->name('show');


		Route::get('/create', 'create')->name('create');
		Route::post('/store', 'store')->name('store');

		Route::get('/{id}/edit', 'edit')->where('id', '[0-9]+')->name('edit');
		Route::patch('/{id}/update', 'update')->where('id', '[0-9]+')->name('update');

		Route::delete('/{id}/delete', 'destroy')->where('id', '[0-9]+')->name('delete');
	} );

