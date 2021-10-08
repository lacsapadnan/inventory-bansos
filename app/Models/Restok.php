<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Restok extends Model
{
    use HasFactory;
    protected $fillable = [
        'produk_id', 'supplier_id', 'qty', 'tanggal'
    ];

    public function produk() {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function supplier() {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
