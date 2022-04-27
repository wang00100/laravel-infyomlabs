<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class staffResource extends JsonResource
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
            'avatar' => $this->avatar,
            'name' => $this->name,
            'tags' => $this->tags,
            'brief' => $this->brief,
            'intro' => $this->intro,
            'photos' => $this->photos,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
