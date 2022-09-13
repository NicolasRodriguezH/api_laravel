<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        /* Los recursos sirven para transformar la respuesta que nosostros vayamos a tener en nuestra api */
        return [
            'ideeeed' => $this->id,
            'nombres' => Str::upper($this->names),
            'apellidos' => Str::of($this->surnames)->upper(),
            'edad' => $this->age,
            'sexo' => $this->sex,
            'dni' => $this->cedula,
            'tipo_sangre' => $this->tipo_sangre,
            'telefono' => $this->cel,
            'correo' => $this->email,
            'direccion' => $this->addres/* ,
            'created_at' => $this->created_at->format('d-m-Y'),
            'updated_at' => $this->updated_at->format('d-m-Y'), */
        ];
    }

    public function with($request) {
        return [
            'res' => true,
        ];
    }
}
