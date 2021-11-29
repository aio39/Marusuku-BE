<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class MenuCollection extends ResourceCollection
{
//        자동으로 Menu + Resource 파일을 찾음.
//    public $collects = 'app\Http\Resource\MenuResource';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data'=>$this->collection,
            'links'=>[
                'self'=> 'link-value',
            ]
        ];

//        return parent::toArray($request);
    }
}
