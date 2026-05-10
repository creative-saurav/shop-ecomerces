<?php
use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;


Route::middleware(['auth', 'verified', 'isAdmin'])->prefix('backend')->as('admin.')->group(function () {

   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');







   Route::get('/cc', [DashboardController::class, 'cacheClear'])->name('cc');

});