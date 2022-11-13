<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class getCalls extends JsonResource
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
            "callId"=> $this->callId,
            "phoneNumber"=> $this->phoneNumber,
            "dateTimeReceived"=> $this->dateTimeReceived,
            "dateTimeAnswered"=> $this->dateTimeAnswered,
            "dateTimeEnded"=> $this->dateTimeEnded,
            "timeInQueue"=> $this->timeInQueue,
            "timeInCall"=> $this->timeInCall,
            "idStatus"=> $this->idStatus,
            "callStatus"=> $this->callStatus,
            "idAgent"=> $this->idAgent,
            "Agent"=> $this->name,
            "Station"=> $this->idStation,
        ];
    }
}
