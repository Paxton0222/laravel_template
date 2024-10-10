<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\PermissionGroupController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\SystemMonitor;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserRoleController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', static function () {
    return Inertia::render('WelcomePage');
})->name('index');

Route::get('/dashboard', static function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'edit'])->name('user.edit');
        Route::post('/', [UserController::class, 'create'])->name('user.create');
        Route::put('/', [UserController::class, 'update'])->name('user.update');
        Route::delete('/', [UserController::class, 'delete'])->name('user.delete');
    });

    Route::prefix('system-monitor')->group(static function () {
        Route::get('/horizon', [SystemMonitor::class, 'horizon'])->name('system-monitor.horizon');
        Route::get('/telescope', [SystemMonitor::class, 'telescope'])->name('system-monitor.telescope');
    });
});

require __DIR__.'/auth.php';
