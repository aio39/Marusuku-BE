<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ShopResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
//        return parent::toArray($request);

        return [
            'id' => $this->id,
            'name'=> $this->name,
            'desc'=> $this->desc,
            'phone'=> $this->phone,
            'homepage'=> $this->homepage,
            'address'=> $this->address,
            'address2'=> $this->address2,
            'location'=> $this->location,
            'user_id'=> $this->user_id,
            'dis' => $this->dis,
            'menus'=> $this->whenLoaded('menus'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
