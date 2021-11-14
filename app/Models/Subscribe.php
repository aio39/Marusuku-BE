<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscribe extends Pivot
{
    protected $table = 'subscribes';

    protected $fillable = [
    'settlement_date',
    'continue',
    'user_id',
    'menu_id',
    'shop_id',
    ];

    protected $attributes = [
        'continue' => true,
    ];


    public function shops(){
        return $this->belongsTo('App\Models\Shop','shop_id','id');
    }

}
