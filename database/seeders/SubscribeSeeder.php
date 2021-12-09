<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\Subscribe;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SubscribeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $users = User::all();
        foreach ($users as $user){
           $menus =  Menu::query()->inRandomOrder()->limit(10)->get();
           foreach ($menus as $menu){
                $timestamp = $faker->dateTimeBetween('-200 days','-1 days')->getTimestamp();
                $carbon =  Carbon::createFromTimestamp($timestamp);
                $settlement_date = $carbon->addMonth($menu->cycle_month);
                $end_date =  $carbon->addMonth(1)->subMinute(1);

               while ($settlement_date->lt(Carbon::now())){
                    $settlement_date->addMonth($menu->cycle_month);
                }

                while ($end_date->lt(Carbon::now())){
                    //                TODO  여기서 바로 결제 이력도 시딩?
                    $end_date->addMonth(1);
                }

               Subscribe::query()->create([
                   'created_at'=> $carbon->toDateTimeString(),
                   'settlement_date'=>$settlement_date->toDateTimeString(),
                    'end_date'=> $end_date->toDateTimeString(),
                    'user_id'=> $user->id,
                    'menu_id'=> $menu->id,
                    'shop_id'=> $menu->shop_id
               ]);
           }
        }


    }
}
