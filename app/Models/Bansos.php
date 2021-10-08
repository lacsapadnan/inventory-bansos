<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
         return $this->belongsTo(Penerima::class, 'penerima_id');
    }
}
