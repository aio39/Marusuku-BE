<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * @property \Grimzy\LaravelMysqlSpatial\Types\Point   $location
 */
class Shop extends Model
{
    use HasFactory;
    use SpatialTrait;
    use Searchable;

//    protected $fillable = [
//        'name','description','phone', 'homepage','address','address2','location','user_id','img'
//    ];

    protected $guarded = ['id'];

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

    public  function  category(){
        return $this->hasOne('App\Models\Category');
    }

}
