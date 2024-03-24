<?php

use App\Http\Controllers\Frontend\BookingController;

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the user has not confirmed their email
 */
Route::group([
    'prefix' => 'bookings',
    'as' => 'bookings.',
    'middleware' => ['auth', 'password.expires', config('boilerplate.access.middleware.verified')]
], function () {
    Route::get('/', [BookingController::class, 'index'])->name('index');
    Route::get('create', [BookingController::class, 'create'])->name('create');
    Route::get('/ajax-get-store-services', [BookingController::class, 'getStoreServices'])->name('ajax-store-services');

    Route::group(['prefix' => '{bookings}'], function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        Route::get('/', [BookingController::class, 'show'])->name('show');
        Route::get('edit', [BookingController::class, 'edit'])->name('edit');
        Route::patch('/', [BookingController::class, 'update'])->name('update');
    });

    Route::post('/store', [BookingController::class, 'store'])->name('store');
});
