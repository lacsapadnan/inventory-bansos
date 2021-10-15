<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paketrw extends Model
{
    use HasFactory;
    protected $table = "paket_rw";
    protected $fillable = [
        'id_paket_bansos', 'id_rw', 'stok'
    ];

    public function paket() {
         return $this->belongsTo(PaketBansos::class, 'id_paket_bansos');
    }
    public function penerima() {
         return $this->belongsTo(User::class, 'id_rw');
    }

}
