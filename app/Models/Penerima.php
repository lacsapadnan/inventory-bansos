<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerima extends Model
{
    use HasFactory;
    protected $fillable = ['nama', 'user_id', 'email', 'alamat', 'telp', 'status'];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
