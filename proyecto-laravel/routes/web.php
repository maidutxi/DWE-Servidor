<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PeliculaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

//Route::get('/', function() {
    //return view('home');
//}); sin homeController

//Route::get('/', [HomeController::class, ]); con el invoke

Route::get('/', [HomeController::class, 'index']);
Route::get('/prueba', [UserController::class, 'index']) ;
Route::get('/crear', [PeliculaController::class, 'create']);
Route::get('/show', [PeliculaController::class, 'show']);
Route::get('/update', [PeliculaController::class, 'update']);
Route::get('/delete', [PeliculaController::class, 'delete']);

Route::post('/store', [PeliculaController::class, 'store']);
//post es para insert, update formularios 
?>
