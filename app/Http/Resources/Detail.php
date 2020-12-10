<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Detail extends JsonResource
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
            'harga' => $this->harga
            
        ];
    }
}
