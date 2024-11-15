<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\FakultasController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\ProdiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('fakultas', [FakultasController::class, 'getFakultas'])->middleware(['auth:sanctum','ability:read']);
Route::get('prodi', [ProdiController::class, 'getProdi'])->middleware('auth:sanctum'); 

Route::get('mahasiswas', [MahasiswaController::class, 'getMahasiswa'])->middleware('auth:sanctum');
Route::post('mahasiswa',[MahasiswaController::class,'storeMahasiswa']);

Route::post('fakultas', [FakultasController::class, 'storeFakultas'])->middleware(['auth:sanctum','ability:create']);
Route::post('prodi', [ProdiController::class, 'storeProdi']);

Route::delete('fakultas/{id}',[FakultasController::class, 'destroyFakultas']);

Route::post('register', [AuthController::class, 'register']);

Route::post('login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('register', [AuthController::class, 'register']);
    // Add other protected routes here
});