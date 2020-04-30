<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            "id" => $this->id,
            "estimated_price_by_client" => $this->estimated_price_by_client,
            "order_description" => $this->order_description,
            "discount_code" => $this->discount_code,
            "delivery_price" => $this->delivery_price,
            "order_status" => new StatusResource($this->whenLoaded('statusRelation')),
        ];
    }
}
