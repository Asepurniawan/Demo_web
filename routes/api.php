<?php

use App\Http\Controllers\Api\MediaController;
use Illuminate\Support\Facades\Route;

Route::apiResource('media', MediaController::class)
    ->parameters(['media' => 'media']);
Route::post('media/{media}/users/{user}', [MediaController::class, 'attachUser']);
Route::delete('media/{media}/users/{user}', [MediaController::class, 'detachUser']);
