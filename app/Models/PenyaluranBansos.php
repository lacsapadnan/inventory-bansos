<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenyaluranBansos extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_penerima', 'id_paket_rw'
    ];

    public function penerima() {
        return $this->hasMany(User::class);
    }

    public function paket_rw() {
        return $this->hasMany(Paketrw::class);
    }
}
