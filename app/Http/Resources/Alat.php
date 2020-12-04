<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Alat extends JsonResource
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

            'id_alat' => $this->id_alat,

            'nama_alat' => $this->nama_alat,

            'stok' => $this->stok,

            'harga' => $this->harga,

            'foto' => $this->foto,
            
            'deskripsi' => $this->deskripsi
        ];
    }
}
