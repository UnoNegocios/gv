<?php

namespace App\Http\Resources\ad_campaign;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\client\ClientResource;

class AdCampaignResource extends JsonResource
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
            'name' => $this->name,
            'start_datetime' => $this->start_datetime,
            'end_datetime' => $this->start_datetime,
            'views' => $this->views,
            'clicks' => $this->clicks,
            'is_active' => $this->is_active,
            //'client' => new ClientResource($this->client),

            'created_at' => date('d-m-Y H:i:s', strtotime($this->created_at)),
            'updated_at' => date('d-m-Y H:i:s', strtotime($this->updated_at)),

        ];
    }
}
