<?php

use App\Http\Controllers\Frontend\CarController;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group([
    'prefix' => 'cars',
    'as' => 'cars.',
    'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]
], function () {
    Route::get('/', [CarController::class, 'index'])->name('index');
    Route::get('create', [CarController::class, 'create'])->name('create');

    Route::group(['prefix' => '{cars}'], function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        Route::get('/', [CarController::class, 'show'])->name('show');
        Route::get('edit', [CarController::class, 'edit'])->name('edit');
        Route::patch('/', [CarController::class, 'update'])->name('update');
    });

    Route::post('/store', [CarController::class, 'store'])->name('store');
});
