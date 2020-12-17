<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Config extends JsonResource
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

            'id_config' => $this->id_config,

            'nama_config' => $this->nama_config,

            'isi' => $this->isi
        ];
    }
}
