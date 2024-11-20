<?php


use App\Http\Controllers\CabinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\AuthController;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Poner nombres a todas las rutas 
Route::get('/hola/locos', [CabinController::class, 'index'])->name("hola.locos");

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
});
