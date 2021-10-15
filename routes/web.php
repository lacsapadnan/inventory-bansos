<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketBansosController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RestokController;
use App\Http\Controllers\SupplierController;
use Illuminate\Support\Facades\Route;

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

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::resource('supplier', SupplierController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('restok', RestokController::class);
    // Route::resource('bansos', BansosController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('paket-bansos', PaketBansosController::class);
    Route::get('/showDetail', [PaketBansosController::class, 'showDetail'])->name('showDetail');
    Route::get('/DeleteDetail', [PaketBansosController::class, 'DeleteDetail'])->name('DeleteDetail');

    // Route untuk verifikasi
    Route::get('/verifikasi', [PenerimaController::class, 'verifikasi'])->name('verifikasi');
    Route::get('/disetujui/{id}', [PenerimaController::class, 'disetujui'])->name('disetujui');
    Route::get('/ditolak/{id}', [PenerimaController::class, 'ditolak'])->name('ditolak');
});

