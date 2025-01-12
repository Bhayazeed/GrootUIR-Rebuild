<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['api.key', 'throttle:api'])
    ->prefix('v1')
    ->group(function () {
        Route::apiResource('/activities', App\Http\Controllers\Api\ActivityController::class);
        Route::apiResource('/projects', App\Http\Controllers\Api\ProjectController::class);          
    });

Route::middleware('api.key')->get('/test-middleware', function () {
    return response()->json(['message' => 'API key is valid']);
});