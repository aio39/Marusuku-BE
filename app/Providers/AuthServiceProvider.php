<?php

namespace App\Providers;

use Illuminate\Auth\Access\Response;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // example , Gate는 항상 사용자 인스턴스를 받음.
        // 이후 Gate::forUser로 특정 유저 지정 전달 가능, any none
        // authorize로 실패시 404 자동 응답 가능.
        Gate::define('shop-owner', function ($user, $shop) {
            return $user->id === $shop->user_id ? Response::allow() : Response::deny('가게 오너가 아닙니다');
        });


//            원래는 localhost 일 경우에만 접근 가능함.
        Gate::define('viewWebSocketsDashboard', function ($user = null) {
            return true;
//            return in_array($user->email, [
//                //
//            ]);
        });
    }
}
