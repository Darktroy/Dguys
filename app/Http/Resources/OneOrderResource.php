<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class OneOrderResource extends JsonResource
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
             "shop_name" => $this->OrderPickDropRel->shop_name ,
            "shop_latitude" => $this->OrderPickDropRel->shop_latitude,
            "shop_longitude" => $this->OrderPickDropRel->shop_longitude,
            "shop_address" => $this->OrderPickDropRel->shop_address,
            "drop_latitude" => $this->OrderPickDropRel->drop_latitude,
            "drop_longitude" => $this->OrderPickDropRel->drop_longitude,
            "drop_address" => $this->OrderPickDropRel->drop_address,
        ];
    }
}
