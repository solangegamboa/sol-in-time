<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CheckinCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $typeName = explode('_', $this->types->name);
        return [
            'Cadastro' => $this->users->register_number,
            'Nome' => $this->users->name,
            'Tipo do Ponto' => $typeName[0],
            'Data' => $this->date->format('d/m/Y'),
            'Horario trabalhado' => $this->time->format('H:i:s'),
            'Escala normal de trabalho' => $this->types->default_time,
            'Observasão' => $this->obs
        ];
    }
}
