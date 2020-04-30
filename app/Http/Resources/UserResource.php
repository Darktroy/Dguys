<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'type' => $this->type,
            'active' => $this->active,
            'device_id' => $this->device_id,
            'mobile' => $this->mobile,
            'profile_image' => url($this->profile_image),
        ];
    }
}
