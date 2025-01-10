<?php

use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('/activities', App\Http\Controllers\Api\ActivityController::class);
Route::apiResource('/projects', App\Http\Controllers\Api\ProjectController::class);
