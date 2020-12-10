<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Transaksi extends JsonResource
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
            'id_sewa' => $this->id_sewa,
            'id_user' => $this->id_user,
            'tgl_sewa' => $this->tgl_sewa,
            'total' => $this->total,
            'bayar' => $this->bayar,
            'status' => $this->status,
            'lahan' => $this->lahan,
            
        ];
    }
}
