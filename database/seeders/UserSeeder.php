<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('users')->insert([[
            'name'=> 'admin',
            'email'=> 'admin@example.com',
            'email_verified_at'=> now(),
            'password'=> \Hash::make('123456789'),
            'created_at'=> now(),
            'updated_at'=> now(),
        ],
            [
                'name'=> 'miku',
                'email'=> 'miku@example.com',
                'email_verified_at'=> now(),
                'password'=> \Hash::make('123456789'),
                'created_at'=> now(),
                'updated_at'=> now(),
            ],
            [
                'name'=> 'rin',
                'email'=> 'rin@example.com',
                'email_verified_at'=> now(),
                'password'=> \Hash::make('123456789'),
                'created_at'=> now(),
                'updated_at'=> now(),
            ]]);


        User::factory()->times(40)->create();
    }
}
