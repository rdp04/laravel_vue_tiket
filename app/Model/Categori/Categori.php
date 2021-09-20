<?php

namespace App\Model\Categori;

use App\Model\Tiket\Tiket;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categori extends Model
{
    protected $guarded = [];

    public function tiket()
    {
        return $this->hasMany(Tiket::class,'id_kategori','id');
    }
}
