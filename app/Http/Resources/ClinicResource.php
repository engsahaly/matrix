<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClinicResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'doctor' => $this->doctor->name ,
            'fees' => $this->fees ,
            'speciality' => $this->speciality ,
            'location' => $this->location ,
            'description' => $this->description ,
        ] ;
    }
}
