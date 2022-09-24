<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class NurseResource extends JsonResource
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
            'nombre' => $this->name,
            'cedula' => $this->cedula,
        ];
    }

    public function with($request) {
        return [
          "res" => true  
        ];
    }
}
