<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class page_configResource extends JsonResource
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
            'slug' => $this->slug,
            'content' => $this->content,
            'media' => $this->media,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}