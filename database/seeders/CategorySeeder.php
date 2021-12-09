<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories')->insert([
        [
            'name'=> '카페',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],[
            'name'=> '음식점',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],[
            'name'=> '마트',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],[
            'name'=> '베이커리',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],[
            'name'=> '헤어샵',
            'created_at'=> now(),
            'updated_at'=> now(),
        ],[
            'name'=> '주유소',
            'created_at'=> now(),
            'updated_at'=> now(),
        ]
        ]);

        \DB::table('categories')->insert([
            [
                'name'=> '한식',
                'parent_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '일식',
                'parent_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '중식',
                'parent_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '뷔페',
                'parent_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '아시아',
                'parent_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ],[
                'name'=> '양식',
                'parent_id'=>2,
                'created_at'=> now(),
                'updated_at'=> now(),
            ]
        ]);


    }
}
