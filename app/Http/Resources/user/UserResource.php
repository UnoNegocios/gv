<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name'=> $this->name,
            'last'=> $this->last,
            'email'=> $this->email,
            'type'=> $this->type,
            'age'=> $this->age,
            'gender'=> $this->gender,
            'city'=> $this->city,
            'state'=> $this->state,
            'birthdate' => $this->birthdate
            //'origin'=> new OriginResource($this->origin),

        ];
    }
}
