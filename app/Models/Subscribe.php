<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Subscribe extends Pivot
{
    protected $table = 'subscribes';

    protected $fillable = [
    'settlement_date',
    'end_date',
    'is_continue',
    'user_id',
    'menu_id',
    'shop_id',
    ];

//    protected $with = ['shops','menus'];

    protected $attributes = [
        'is_continue' => true,
    ];


    public function user(){
        return $this->belongsTo('App\Models\User','user_id','id');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop','shop_id','id');
    }

    public function menu(){
        return $this->belongsTo('App\Models\Menu','menu_id','id');
    }

    public function useHistories(){
        return $this->hasMany('App\Models\UseHistory','subscribe_id','id');
    }


}
