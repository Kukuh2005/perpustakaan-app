<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PenerbitController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\AnggotaController;
use App\Http\Controllers\BukuController;
use App\http\Controllers\AuthController;
use App\http\Controllers\DashboardController;
use App\http\Controllers\PinjamanController;
use App\http\Controllers\PengembalianController;
use App\http\Controllers\PetugasController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::post('/postlogin', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout']);
Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function(){
    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/category', [KategoriController::class, 'index']);
    Route::post('/category/store', [KategoriController::class, 'store']);
    Route::get('/category/{id}/edit', [KategoriController::class, 'edit']);
    Route::put('/category/{id}', [KategoriController::class, 'update']);
    Route::get('/category/{id}', [KategoriController::class, 'destroy']);

    Route::get('/penerbit', [PenerbitController::class, 'index']);
    Route::post('/penerbit/store', [PenerbitController::class, 'store']);
    Route::get('/penerbit/{id}/edit', [PenerbitController::class, 'edit']);
    Route::put('/penerbit/{id}', [PenerbitController::class, 'update']);
    Route::get('/penerbit/{id}', [PenerbitController::class, 'destroy']);


    Route::get('/anggota', [AnggotaController::class, 'index']);
    Route::post('/anggota/store', [AnggotaController::class, 'store']);
    Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit']);
    Route::put('/anggota/{id}', [AnggotaController::class, 'update']);
    Route::get('/anggota/{id}', [AnggotaController::class, 'destroy']);

    Route::get('/buku', [BukuController::class, 'index']);
    Route::get('/buku/{id}/print', [BukuController::class, 'print']);
    Route::post('/buku/store', [BukuController::class, 'store']);
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit']);
    Route::put('/buku/{id}', [BukuController::class, 'update']);
    Route::get('/buku/{id}', [BukuController::class, 'destroy']);

    Route::get('/pinjam', [PinjamanController::class, 'index']);
    Route::post('/pinjam/store', [PinjamanController::class, 'store']);
    Route::get('/pinjam/{id}/edit', [PinjamanController::class, 'edit']);
    Route::put('/pinjam/{id}', [PinjamanController::class, 'update']);
    Route::get('/pinjam/{id}', [PinjamanController::class, 'destroy']);

    Route::get('/kembali', [PengembalianController::class, 'index']);
    Route::post('/kembali/store', [PengembalianController::class, 'store']);
    Route::get('/kembali/{id}/edit', [PengembalianController::class, 'edit']);
    Route::put('/kembali/{id}', [PengembalianController::class, 'update']);
    Route::get('/kembali/{id}', [PengembalianController::class, 'destroy']);

    Route::get('/petugas', [PetugasController::class, 'index']);
    Route::put('/petugas/{id}', [PetugasController::class, 'update']);
});