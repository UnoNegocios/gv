<?php

namespace App\Http\Resources\user;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\segment\SegmentResource;
use App\Http\Resources\origin\OriginResource;

class CurrentUserResource extends JsonResource
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
            'name' => $this->name . ' ' . $this->last,
            'email' => $this->email,
            'gender' => $this->gender,
            'city' => $this->city,
            'state' => $this->state,
            'segment' => new SegmentResource($this->segment),
            'origin' => new OriginResource($this->origin),
            'email_verified_at' =>  $this->email_verified_at
        ];
    }
}
