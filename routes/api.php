<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ActivityController;
use App\Http\Controllers\Api\ProjectController;
use Illuminate\Support\Facades\Route;

// Public routes (no authentication namun perlu API-Key)
Route::middleware(['api.key', 'throttle:api'])
    ->prefix('v1')
    ->group(function () {
        // Read Only untuk Public
        Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
        Route::get('/activities/{id_activity}', [ActivityController::class, 'show'])->name('activities.show');
        Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
        Route::get('/projects/{id_project}', [ProjectController::class, 'show'])->name('projects.show');
    });

// Admin Login (no authentication namun perlu API-KEY)
Route::middleware(['api.key'])
    ->prefix('v1/admin')
    ->group(function () {
        Route::post('/login', [AuthController::class, 'login'])->name('admin.login');
    });

// Route Untuk Admin (Perlu Authentication)
Route::middleware(['api.key', 'auth:sanctum'])
    ->prefix('v1/admin')
    ->group(function () {
        // Admin authentication
        Route::post('/logout', [AuthController::class, 'logout'])->name('admin.logout');
        Route::post('/register', [AuthController::class, 'register'])->name('admin.register');

        // CRUD untuk activities
        Route::post('/activities', [ActivityController::class, 'store'])->name('activities.store');
        Route::put('/activities/{id_activity}', [ActivityController::class, 'update'])
            ->name('activities.update');
        Route::delete('/activities/{id_activity}', [ActivityController::class, 'destroy'])->name('activities.destroy');

        // CRUD untuk Project
        Route::post('/projects', [ProjectController::class, 'store'])->name('projects.store');
        Route::put('/projects/{id_project}', [ProjectController::class, 'update'])->name('projects.update');
        Route::delete('/projects/{id_project}', [ProjectController::class, 'destroy'])->name('projects.destroy');
    });