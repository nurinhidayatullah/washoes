<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Service extends JsonResource
{
    public function toArray($request)
    {
        // return parent::toArray($request);
        return  [
            'id' => $this->id,
            'title' => $this->title,
            'details' => $this->details,
            'image' => $this->image,
        ];
    }
}
