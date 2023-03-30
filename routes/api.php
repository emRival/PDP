<?php

use App\Http\Controllers\AsramaController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KelasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


Route::controller(AsramaController::class)->group(function() {
    Route::post('asrama/create', 'create');
    Route::get('asrama', 'index');
    Route::post('asrama/{id}', 'store');
    Route::delete('asrama/{id}', 'destroy');
    Route::delete('asrama/{id}/restore', 'restore');
});

Route::controller(KelasController::class)->group(function() {
    Route::post('kelas/create', 'create');
    Route::get('kelas', 'index');
    Route::post('kelas/{id}', 'store');
    Route::delete('kelas/{id}', 'destroy');
    Route::delete('kelas/{id}/restore', 'restore');
});



