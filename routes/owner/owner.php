<?php

use App\Http\Controllers\Owner\DashboardController;
use App\Domains\Auth\Http\Controllers\Frontend\Auth\VerificationController;
use Tabuna\Breadcrumbs\Trail;

// All route names are prefixed with 'admin.'.
Route::redirect('/', '/owner/dashboard', 301);
Route::get('email/verify', [VerificationController::class, 'showOwner'])->name('verification.notice');
Route::get('dashboard', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->breadcrumbs(function (Trail $trail) {
        $trail->push(__('Home'), route('owner.dashboard'));
    })
    ->middleware('verified.owner');