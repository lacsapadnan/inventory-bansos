<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bansos extends Model
{
    use HasFactory;
    protected $fillable = [
        'paket_id', 'penerima_id', 'qty', 'tanggal'
    ];

    public function paket() {
         return $this->belongsTo(PaketBansos::class, 'paket_id');
    }
    public function penerima() {
         return $this->belongsTo(User::class, 'penerima_id');
    }


public function update_stock_out($id_produk, $qty, $kali){
        $a = $qty*$kali;
        DB::update("UPDATE produks SET stok = stok - $a where id='$id_produk'");
    }
}
