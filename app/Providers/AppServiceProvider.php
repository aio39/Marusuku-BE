<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        validator::extend('uniqueFirstAndLastName', function ($attribute, $value, $parameters, $validator) {
//            $count = DB::table('people')->where('firstName', $value)
//                ->where('lastName', $parameters[0])
//                ->count();
//
//            return $count === 0;
//        });
    }
}
