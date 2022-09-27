<?php

namespace App\Http\Resources\ad;

use Illuminate\Http\Resources\Json\JsonResource;

class AdResource extends JsonResource
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
            'title' => $this->title,
            'alt' => $this->alt,
            'url' => $this->url,
            'image_url' => $this->image_url,
            'image_path' => $this->image_path,
            'views' => $this->views,
            'impressions' => $this->impressions,
            'clicks' => $this->clicks,
            'is_active' => $this->is_active,
            'start_time' => $this->start_time,
            'end_time' => $this->end_time,
            'height' => $this->height,
            'width' => $this->width,
            'position' => $this->position
        ];

    }
}
