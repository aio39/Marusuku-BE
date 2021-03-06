<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Menu;
use App\Models\Review;
use App\Models\Shop;
use App\Models\Subscribe;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call([
            UserSeeder::class,
            Category::class,
            ShopSeeder::class,
            Menu::class,
            Subscribe::class,
            Review::class,
        ]);

    }
}
