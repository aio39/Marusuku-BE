<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MenuResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name'=> $this->name,
            'price'=> $this->price,
            'cycle_month'=> $this->cycle_month,
            'limit_day'=> $this->limit_day,
            'limit_week'=> $this->limit_week,
            'limit_month'=> $this->limit_month,
            'limit_year'=> $this->limit_year,
            'description'=> $this->description,
            'score'=>$this->score,
            'img'=> $this->img,
            'shop_id'=> $this->shop_id,
            'shop'=> new ShopResource($this->whenLoaded('shop')) ,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'vanish'=>$this->vanish,
            'vanish_at'=>$this->vanish
    ];
    }
}
