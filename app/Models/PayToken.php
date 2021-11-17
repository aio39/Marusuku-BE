<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PayToken extends Model
{
    use HasFactory;

    protected $fillable = [ 'uuid',
                            'user_id',
                            'menu_id',
                            'shop_id',];







}
