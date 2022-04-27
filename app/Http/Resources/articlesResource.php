<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class articlesResource extends JsonResource
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
            'content' => $this->content,
            'keywords' => $this->keywords,
            'cats' => $this->cats,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
