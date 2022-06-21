<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'gender'=>$this->gender,
            'my_information'=>$this->my_information,
            'specialization'=>SpecializationResource::make($this->specialization),
            
 
         ];
        return parent::toArray($request);
    }
}
