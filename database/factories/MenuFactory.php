<?php

namespace Database\Factories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MenuFactory extends Factory
{


    protected  $model = Menu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();
        return [
            'name' => Str::random(10),
            'price'=>  $faker->numberBetween(1000,30000),
            'cycle_month'=>  $faker->numberBetween(1,12),
            'limit_month'=>  $faker->numberBetween(1,30),
            'desc' => Str::random(10),
            'img' => Str::random(10),
            'shop_id' => $faker->numberBetween(1,30),
        ];
    }
}
