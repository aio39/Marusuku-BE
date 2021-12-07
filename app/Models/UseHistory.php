<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UseHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'discount',
        'user_id',
        'menu_id',
        'shop_id',
        'subscribe_id'
];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function menu(){
        return $this->belongsTo('App\Models\Menu');
    }

    public function shop(){
        return $this->belongsTo('App\Models\Shop');
    }

    public function subscribe(){
        return $this->belongsTo('App\Models\Subscribe');
    }


}
