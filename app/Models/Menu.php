<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'name' , 'price' , 'cycle_month' , 'limit_day' , 'limit_week' , 'limit_month' , 'limit_year' , 'desc' , 'img' , 'shop_id' , 'vanish' , 'vanish_at'
        , 'limit_day_amount' ,
        'limit_week_amount' ,
        'limit_month_amount' ,
        'limit_year_amount' ,
    ];

    // create가 속성을 안 뺴먹게 기본값 설정.
    protected $attributes = [
        'cycle_month' => 0,
        'limit_day'=> null,
        'limit_week'=> null,
        'limit_month'=>null,
        'limit_year'=> null,
        'limit_day_amount'=> null,
        'limit_week_amount'=> null,
        'limit_month_amount'=>null,
        'limit_year_amount'=> null,
        'desc'=> null,
        'img'=> null,
        'vanish'=>false,
        'vanish_at'=>null
    ];

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

}
