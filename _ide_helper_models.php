<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Shop
 *
 * @property \Grimzy\LaravelMysqlSpatial\Types\Point   $location
 * @property int $id
 * @property string $name
 * @property string|null $desc
 * @property string|null $phone
 * @property string|null $homepage
 * @property string $address
 * @property string|null $address2
 * @property int $score_total
 * @property int $score_count
 * @property string $position
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop comparison($geometryColumn, $geometry, $relationship)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop contains($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop crosses($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop disjoint($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop distance($geometryColumn, $geometry, $distance)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop distanceExcludingSelf($geometryColumn, $geometry, $distance)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop distanceSphere($geometryColumn, $geometry, $distance)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop distanceSphereExcludingSelf($geometryColumn, $geometry, $distance)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop distanceSphereValue($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop distanceValue($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop doesTouch($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop equals($geometryColumn, $geometry)
 * @method static \Database\Factories\ShopFactory factory(...$parameters)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop intersects($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop newModelQuery()
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop newQuery()
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop orderByDistance($geometryColumn, $geometry, $direction = 'asc')
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop orderByDistanceSphere($geometryColumn, $geometry, $direction = 'asc')
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop orderBySpatial($geometryColumn, $geometry, $orderFunction, $direction = 'asc')
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop overlaps($geometryColumn, $geometry)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop query()
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereAddress($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereAddress2($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereCreatedAt($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereDesc($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereHomepage($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereId($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereName($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop wherePhone($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop wherePosition($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereScoreCount($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereScoreTotal($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereUpdatedAt($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereUserId($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop within($geometryColumn, $polygon)
 */
	class Shop extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $avatar
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

