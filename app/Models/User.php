<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $with = ['shop'];


    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'photo'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // ! 패스워드 언제나 암호화
    /**
     * Always encrypt password when it is updated.
     *
     * @param $value
     * @return string
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }


    public function shop(){
        return $this->hasOne('App\Models\Shop','user_id')->limit(1);
    }

    public function subscribes(){
        return $this->belongsToMany('App\Models\Menu','subscribes','user_id','menu_id')->using('App\Models\Subscribe');
    }

    public function reviews(){
        return $this->belongsToMany('App\Models\Menu','reviews','user_id','menu_id')->using('App\Models\Review');
    }

    public function pay_tokens(){
        return $this->belongsToMany('App\Models\Menu','pay_tokens','user_id','menu_id')->using('App\Models\PayToken');
    }

    public function use_histories(){
        return $this->belongsToMany('App\Models\Menu','use_histories','user_id','menu_id')
            ->using('App\Models\UseHistory')
            ->withPivot('created_at',
                'updated_at',
                'user_id',
                'menu_id',
                'shop_id',);
    }
}
