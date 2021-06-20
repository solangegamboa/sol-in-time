<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class CheckinCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'Cadastro' => $this->users()->register_number,
            'Nome' => $this->users()->name,
            'Tipo do Ponto' => $this->types()->name,
            'Data' => $this->date->format('d/M/Y'),
            'Horario trabalhado' => $this->time->format('H:i'),
            'Escala normal de trabalho' => $this->types()->default_time,
            'Observasão' => $this->obs
        ];
    }
}
