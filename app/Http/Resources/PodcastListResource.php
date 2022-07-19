<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PodcastListResource extends JsonResource
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
            'status' => $this->status,
            'category' => $this->category->title,
            'artist' => $this->artist->name,
            'image' => asset('/uploads/images/' . $this->image),
            'audio' => asset('/uploads/audios/' . $this->audio),
        ];
    }
}
