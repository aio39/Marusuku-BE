<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Grimzy\LaravelMysqlSpatial\Types\Point   $location
 */
class Shop extends Model
{
    use HasFactory;
    use SpatialTrait;

    protected $fillable = [
        'name','desc','phone', 'homepage','address','address2','location','user_id'
    ];

//    protected $hidden = ['location'];

//    protected $appends = ['lat','lng'];

    protected $spatialFields = [
        'location',
    ];

    protected $casts = [
        'bookmark' => 'bool',
        'user_id'=>'int'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function menus(){
        return $this->hasMany('App\Models\Menu');
    }

}
