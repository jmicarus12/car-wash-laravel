<?php

use App\Http\Controllers\Owner\ServiceController;
use Tabuna\Breadcrumbs\Trail;
use App\Models\CarWashService;

// All route names are prefixed with 'admin.'.
Route::group([
    'prefix' => 'services',
    'as' => 'services.',
    'middleware' => 'verified.owner',
], function () {
    Route::get('/', [ServiceController::class, 'index'])
    ->name('index')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Service'), route('owner.services.index'));
    });
    
    Route::get('create', [ServiceController::class, 'create'])
    ->name('create')
    ->breadcrumbs(function (Trail $trail) {
        $trail->parent('owner.services.index')->push(__('Create Service'), route('owner.services.create'));
    });

    Route::group(['prefix' => '{services}'], function () {
        Artisan::call('view:clear');
        Artisan::call('cache:clear');

        Route::get('/', [ServiceController::class, 'show'])
             ->name('show')
             ->breadcrumbs(function (Trail $trail, CarWashService $services) {
                 $trail->parent('owner.services.index')
                       ->push(__('Service :services', ['services' => $services->service_name]), route('admin.services.show', $services));
        });

        Route::get('edit', [ServiceController::class, 'edit'])
             ->name('edit')
             ->breadcrumbs(function (Trail $trail, CarWashService $services) {
                 $trail->parent('owner.service.index')
                       ->push(__('Editing :services', ['services' => $services->service_name]), route('admin.services.edit', $services));
        });

        Route::patch('/', [ServiceController::class, 'update'])->name('update');
    });

    Route::post('/store', [ServiceController::class, 'store'])->name('store');
});
