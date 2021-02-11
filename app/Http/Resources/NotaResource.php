<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NotaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request); 
        return [
            'user_id' => $this->user, //propiedad dinamica, esta en el modelo nota
            'materia_id' => $this->materia, //propiedad dinamica, esta en el nota
            'evaluacion' => $this->evaluacion,
            'nota' => $this->nota,
        ];
    }
}
