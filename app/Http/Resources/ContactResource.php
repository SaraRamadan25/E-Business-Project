<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ContactResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            "id"=>$this->id,
            "subject"=>$this->subject,
            "email"=>$this->email,
            "name"=>$this->name,
            "message"=>$this->message


        ];
    }
}
