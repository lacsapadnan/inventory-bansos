<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PaketBansosController;
use App\Http\Controllers\PenerimaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\RestokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\BansosController;
use App\Http\Controllers\PaketrwController;
use App\Http\Controllers\PenyaluranBansosController;
use App\Http\Controllers\UserController;
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

Route::get('qr/{id}', [PenyaluranBansosController::class, 'qr']);

Route::get('generate-qrcode', [PenyaluranBansosController::class, 'generate_qrcode']);

Route::middleware(['auth:sanctum', 'verified'])->get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::group(['middleware' => ['auth:sanctum', 'verified']], function() {
    Route::resource('supplier', SupplierController::class);
    Route::resource('produk', ProdukController::class);
    Route::resource('restok', RestokController::class);
    Route::resource('bansos', BansosController::class);
    Route::resource('penerima', PenerimaController::class);
    Route::resource('paketrw', PaketrwController::class);
    Route::resource('paket-bansos', PaketBansosController::class);
    Route::resource('user', UserController::class);
    Route::get('/showDetail', [PaketBansosController::class, 'showDetail'])->name('showDetail');
    Route::get('/DeleteDetail', [PaketBansosController::class, 'DeleteDetail'])->name('DeleteDetail');
    Route::resource('penyaluran', PenyaluranBansosController::class);
    Route::get('/paketbansos', [PaketrwController::class, 'dashboard'])->name('PaketBansosRw');

    // Route untuk verifikasi
    Route::get('/verifikasi', [PenerimaController::class, 'verifikasi'])->name('verifikasi');
    Route::get('/disetujui/{id}', [PenerimaController::class, 'disetujui'])->name('disetujui');
    Route::get('/ditolak/{id}', [PenerimaController::class, 'ditolak'])->name('ditolak');

    // Generate QR Code
    Route::get('qrcode/{id}', [PenyaluranBansosController::class, 'generate'])->name('generate');
});

