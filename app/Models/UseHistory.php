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
];


}
