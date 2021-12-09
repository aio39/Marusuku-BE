<?php

namespace Database\Seeders;

use App\Models\Review;
use App\Models\Subscribe;
use Illuminate\Database\Seeder;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $subscribes = Subscribe::all();
        foreach ($subscribes as $subscribe){
            Review::query()->create([
                'content'=> $faker->realTextBetween(10,100),
                'score'=> $faker->randomNumber(1,5),
                'user_id'=> $subscribe->user_id,
                'menu_id'=> $subscribe->menu_id,
                'shop_id'=> $subscribe->shop_id,
            ]);
        }
    }
}
