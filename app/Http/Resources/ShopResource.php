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
            'description'=> $this->description,
            'phone'=> $this->phone,
            'homepage'=> $this->homepage,
            'address'=> $this->address,
            'address2'=> $this->address2,
            'score' => round($this->score,1),
            'score_total' => $this->score_total,
            'score_count' => $this->score_count,
            'location'=> $this->location,
            'user_id'=> $this->user_id,
            'img'=> $this->img,
            'dis' => $this->dis,
            'menus'=> $this->whenLoaded('menus'),
            'category'=> $this->whenLoaded('category'),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
