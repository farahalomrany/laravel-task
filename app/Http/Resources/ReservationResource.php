<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReservationResource extends JsonResource
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
          'time'=>$this->time,
          'date'=>$this->date,
          'situation'=>$this->situation,
          'patient'=>PatientResource::make($this->patient),
          'clinic'=>ClinicResource::make($this->clinic),
          'offer'=>$this->offer,
          'period'=>$this->period,

        ];
        return parent::toArray($request);
    }
}
