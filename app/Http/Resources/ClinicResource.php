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
        return[
            'id'=>$this->id,
            'name'=>$this->name,
            'phone'=>$this->phone,
            'price'=>$this->price,
            'view_time'=>$this->view_time,
            'location'=>LocationResource::make($this->location),
            'doctor'=>DoctorResource::make($this->doctor),
            
        ];
        return parent::toArray($request);
    }
}
