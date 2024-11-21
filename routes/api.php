<?php


use App\Http\Controllers\CabinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;
use App\Http\Controllers\CabinServiceController;
use App\Http\Controllers\CabinLevelController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReservationController;
Route::post(
    '/v1/register',
    [
        App\Http\Controllers\api\v1\AuthController::class,
        'register'
    ]
)->name('api.register');


Route::post(
    '/v1/login',
    [
        App\Http\Controllers\api\v1\AuthController::class,
        'login'
    ]
)->name('api.login');

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post(
        '/v1/logout',
        [
            App\Http\Controllers\api\v1\AuthController::class,
            'logout'
        ]
    )->name('api.logout');
});

Route::middleware(['auth:sanctum'])->group(function() {
    Route::apiResource('cabins', CabinController::class);
    Route::apiResource('cabin-services', CabinServiceController::class);
    Route::apiResource('cabin-levels', CabinLevelController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('reservations', ReservationController::class);
    Route::get('reservationsCabins', [ReservationController::class, 'reservedCabins']);
});
