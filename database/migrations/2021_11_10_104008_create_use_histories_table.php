<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUseHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('use_histories', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('discount')->default(0);


            $table->foreignId('user_id')->constrained();
            $table->foreignId('menu_id')->constrained();
            $table->foreignId('shop_id')->constrained();


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('use_histories');
    }
}
