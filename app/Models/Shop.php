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
//    public function searchableAs()
//    {
//        return 'shops_index';
//    }  기본값 상태 , primary key  -> getScoutKey

//    public function toSearchableArray()
//    {
////         기본값 -toArray()
//        $array = $this->toArray();
//        return $array;
//    }
//
//    public function shouldBeSearchable()
//    {
////        return $this->isPublished();
//        return true;
//    }

    protected $fillable = [
        'name','description','phone', 'homepage','address','address2','location','user_id'
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
