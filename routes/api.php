<?php

use App\Http\Controllers\Api\MediaController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

Route::apiResource('media', MediaController::class)
    ->parameters(['media' => 'media']);
Route::post('media/{media}/users/{user}', [MediaController::class, 'attachUser']);
Route::delete('media/{media}/users/{user}', [MediaController::class, 'detachUser']);
Route::get('users/{user}/media', [UserController::class, 'media']);
