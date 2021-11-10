<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class ShopSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $csv = array_map('str_getcsv', file('storage/app/places.csv'));
        $shops_data = [];
        foreach ($csv as $data) {
            $shops_data[] = [
                'name'=> $data[0],
                'desc'=> $data[1],
                'phone'=> $data[2],
                'address'=> $data[3],
//            'location'=> new Point($this->faker->latitude(37,38),$this->faker->latitude(37,38),3857),
//            'location'=> new Point(40.7484404, -73.9878441,3857),
                'location'=> \DB::raw("ST_SRID(ST_GeomFromText('POINT(".strval($data[5])." ".strval($data[4]).")'), 4326)"),
                'user_id'=> $faker->numberBetween(1,3),
                'created_at'=> now(),
                'updated_at'=> now()
            ];
        }


        \DB::table('shops')->insert($shops_data);
    }
}
