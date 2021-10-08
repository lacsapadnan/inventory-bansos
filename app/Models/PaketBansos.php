<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaketBansos extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_paket', 'produk_id', 'qty', 'deskripsi'
    ];
}
