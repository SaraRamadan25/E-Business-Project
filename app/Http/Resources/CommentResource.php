<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{

    public function toArray($request):  array
    {
        return [
            "id"=>$this->id,
            "name"=>$this->name,
            "email"=>$this->email,
            "content"=>$this->content,
            "user_id"=>$this->user_id,
            "post_id"=>$this->post_id

        ];
    }
}
