<?php

namespace App\Http\Controllers;

use App\Models\Penerima;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $kelurahan = User::where('roles', 'kelurahan')->count();
        $rw = User::where('roles', 'rw')->count();
        $produk = Produk::all()->count();
        $verifikasi = Penerima::where('status', 'verifikasi')->where('user_id', Auth::user()->id)->count();
        $ditolak = Penerima::where('status', 'ditolak')->where('user_id', Auth::user()->id)->count();
        $disetujui = Penerima::where('status', 'disetujui')->where('user_id', Auth::user()->id)->count();
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
