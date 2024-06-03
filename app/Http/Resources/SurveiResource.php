<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SurveiResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id_survei' => $this->id_survei,
            'poin' => $this->poin,
            'judul' => $this->judul,
            'deskripsi' => $this->deskripsi,
            'jumlah_pertanyaan' => $this->pertanyaan->count(),

        ];
    }
}
