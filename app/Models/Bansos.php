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


    public function update_stock_in($data){
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE item SET stock = stock + '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);

    }

    public function update_stock_out($data){
        $qty = $data['qty'];
        $id = $data['item_id'];
        $sql = "UPDATE item SET stock = stock - '$qty' WHERE item_id = '$id'";
        $this->db->query($sql);

    }
}
