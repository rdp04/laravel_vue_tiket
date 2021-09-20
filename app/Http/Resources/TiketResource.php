<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TiketResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' =>$this->id,
            'name_tiket' =>$this->name_tiket,
            'harga_tiket'=>$this->harga_tiket,
            'jenis_tiket'=>$this->jenis_tiket ,
            'name_categori'=>$this->categori->name_categori,
            'jumlah_tiket'=>$this->jumlah_tiket,
            'id_kategori' =>$this->categori->id
            // 'created_at'=>$this->created_at,
        ];
    }
}
