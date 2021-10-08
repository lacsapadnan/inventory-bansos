<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $kelurahan = User::where('roles', 'kelurahan')->count();
        $rw = User::where('roles', 'rw')->count();
        $produk = Produk::all()->count();
        $verifikasi = Penerima::where('status', 'verifikasi')->count();
        $ditolak = Penerima::where('status', 'ditolak')->count();
        $disetujui = Penerima::where('status', 'disetujui')->count();
        return view('pages.dashboard', [
            'kelurahan' => $kelurahan,
            'rw' => $rw,
            'produk' => $produk,
            'verifikasi' => $verifikasi,
            'ditolak' => $ditolak,
            'disetujui' => $disetujui
        ]);
    }
}
