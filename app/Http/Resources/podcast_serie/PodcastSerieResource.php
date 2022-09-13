<?php

namespace App\Http\Resources\podcast_serie;

use Illuminate\Http\Resources\Json\JsonResource;

class PodcastSerieResource extends JsonResource
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
           'image_url' => $this->image_url,
           'description' => $this->description,
           'podcasts_count' => $this->podcasts()->count(),
           'last_five_podcasts' => $this->podcasts->pluck('title')->take(3),
           'created_at' => date('d-m-Y H:i A', strtotime($this->created_at)),
           'updated_at' => date('d-m-Y H:i A', strtotime($this->updated_at)),

        ];
    }
}
