<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Grimzy\LaravelMysqlSpatial\Eloquent\SpatialTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * @property \Grimzy\LaravelMysqlSpatial\Types\Point   $location
 */
class Place extends Model
{
    use HasFactory;
    use SpatialTrait;

    protected $fillable = [
        'name','desc','address','position','bookmark','user_id'
    ];

    protected $spatialFields = [
        'position',
    ];

    protected $casts = [
        'bookmark' => 'bool',
        'user_id'=>'int'
    ];

}
