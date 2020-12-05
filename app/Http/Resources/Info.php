<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Info extends JsonResource
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

            'id_berita' => $this->id_berita,

            'namaberita' => $this->namaberita,

            'penulis' => $this->penulis,

            'tanggal' => $this->tanggal,

            'foto' => $this->foto,
            
            'deskripsi' => $this->deskripsi
        ];
    }
}
