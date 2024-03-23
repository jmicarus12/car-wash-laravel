<?php

use App\Http\Controllers\Owner\StoreController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::group([
    'prefix' => 'store',
    'as' => 'store.',
    'middleware' => 'verified.owner',
], function () {
    Route::get('/', [StoreController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('owner.store.index'));
    });

    Route::get('/edit', [StoreController::class, 'edit'])
    ->name('edit')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('owner.store.index'));
    });

    Route::post('/update', [StoreController::class, 'update'])->name('update');
});
