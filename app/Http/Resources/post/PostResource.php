<?php

namespace App\Http\Resources\post;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\user\UserResource;
use App\Http\Resources\category\CategoryResource;
use App\Http\Resources\tag\TagResource;

class PostResource extends JsonResource
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
          'slug' => $this->slug,
          'status' => $this->status,
          'content' => $this->content,
          'featured_media_path' => $this->featured_media_path,
          'short_description' => $this->short_description,
          'categories' => CategoryResource::collection($this->Categories),
          'tags' => TagResource::collection($this->Tags),
          'author' => new UserResource($this->author),
          'visibility' => $this->visibility,
          'date' => $this->getDate(),
          'sent_push_notification' => $this->sent_push_notification,
          'created_at' => $this->created_at,
          'updated_at' => $this->updated_at
          
        ];
    }
}
