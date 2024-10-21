<?php


use App\Http\Controllers\CabinController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

//Poner nombres a todas las rutas 
Route::get('/hola/locos' , [CabinController::class ,'index'])->name("hola.locos");

Route::apiResource('cabins',CabinController::class);