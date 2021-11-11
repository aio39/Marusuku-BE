<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'price', 'cycle_month', 'limit_day', 'limit_week', 'limit_month', 'limit_year', 'desc', 'img', 'shop_id','vanish','vanish_at'
    ];

    // create가 속성을 안 뺴먹게 기본값 설정.
    protected $attributes = [
        'cycle_month' => 0,
        'limit_day'=> null,
        'limit_week'=> null,
        'limit_month'=>null,
        'limit_year'=> null,
        'desc'=> null,
        'img'=> null,
        'vanish'=>false,
        'vanish_at'=>null
    ];

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

}
