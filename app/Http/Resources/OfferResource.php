<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OfferResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'details'=> $this->details,
            'start_time'=> $this->start_time,
            'end_time'=> $this->end_time,
            'discound'=> $this->discound,
            'clinic'=>$this->clinic_id,


        ];
        return parent::toArray($request);
    }
}
