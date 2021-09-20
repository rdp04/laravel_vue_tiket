<?php

namespace App\Model\Transaksi;

use App\Model\Tiket\Tiket;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $guarded = [];
    public function tiket()
    {
        return $this->belongsTo(Tiket::class,'id_tiket','id');
    }
}
