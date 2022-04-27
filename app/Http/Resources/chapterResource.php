<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class chapterResource extends JsonResource
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
            'id' => $this->id,
            'title' => $this->title,
            'cover' => $this->cover,
            'public_time' => $this->public_time,
            'staffs' => $this->staffs,
            'media' => $this->media,
            'cats' => $this->cats,
            'tags' => $this->tags,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
