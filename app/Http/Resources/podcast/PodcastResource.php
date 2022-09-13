<?php

namespace App\Http\Resources\podcast;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\podcast_serie\PodcastSerieResource;

class PodcastResource extends JsonResource
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
            'title' => $this->title,
            'url' => $this->url,
            'duration' => $this->duration,
            'description' => $this->description,
            'image_url' => $this->podcastSerie->image_url,
            'podcast_series' => new PodcastSerieResource($this->podcastSerie),

            'created_at' => date('d-m-Y H:i A', strtotime($this->created_at)),
            'updated_at' => date('d-m-Y H:i A', strtotime($this->updated_at)),
        ];
    }
}
