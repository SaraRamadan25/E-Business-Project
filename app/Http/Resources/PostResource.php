<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            "id"=>$this->id,
            "title"=>$this->title,
            "name"=>$this->name,
            "image"=>$this->image,
            "excerpt"=>$this->excerpt,
            "content"=>$this->content,
            "user_id"=>$this->user_id

        ];
    }
}
