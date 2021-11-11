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
 * App\Models\Menu
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property int $price
 * @property int $cycle_month
 * @property int|null $limit_day
 * @property int|null $limit_week
 * @property int|null $limit_month
 * @property int|null $limit_year
 * @property string|null $desc
 * @property string|null $img
 * @property int $shop_id
 * @property int $vanish
 * @property string|null $vanish_at
 * @property-read \App\Models\Shop $shop
 * @method static \Database\Factories\MenuFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu query()
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereCycleMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereDesc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLimitDay($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLimitMonth($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLimitWeek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereLimitYear($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereVanish($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Menu whereVanishAt($value)
 */
	class Menu extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\PayToken
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $uuid
 * @property int $user_id
 * @property int $menu_id
 * @property int $shop_id
 * @method static \Database\Factories\PayTokenFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken query()
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PayToken whereUuid($value)
 */
	class PayToken extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Review
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string $name
 * @property string $content
 * @property int $score
 * @property int $user_id
 * @property int $menu_id
 * @property int $shop_id
 * @method static \Database\Factories\ReviewFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Review newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Review query()
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereScore($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Review whereUserId($value)
 */
	class Review extends \Eloquent {}
}

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
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Menu[] $menus
 * @property-read int|null $menus_count
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
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereLocation($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop whereName($value)
 * @method static \Grimzy\LaravelMysqlSpatial\Eloquent\Builder|Shop wherePhone($value)
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
 * App\Models\UseHistory
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $discount
 * @property int $user_id
 * @property int $menu_id
 * @property int $shop_id
 * @method static \Database\Factories\UseHistoryFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory query()
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereDiscount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereMenuId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereShopId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UseHistory whereUserId($value)
 */
	class UseHistory extends \Eloquent {}
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
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
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

