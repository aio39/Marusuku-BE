<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Review extends Pivot
{
    use HasFactory;

    protected $table = 'reviews';

    protected $fillable = [
        'name','content','score', 'user_id', 'menu_id', 'shop_id',
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
}
