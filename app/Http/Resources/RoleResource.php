<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RoleResource extends JsonResource
{

    public function toArray($request): array
    {
        return [
            "id"=>$this->id,
            "slug"=>$this->slug,
            "permissions"=>$this->permissions,
            "name"=>$this->name


        ];
    }
}
