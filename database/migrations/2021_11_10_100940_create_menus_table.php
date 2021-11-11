<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('name');
            $table->integer('price');
            $table->tinyInteger('cycle_month')->default(0);

            $table->smallInteger('limit_day')->nullable();
            $table->smallInteger('limit_week')->nullable();
            $table->smallInteger('limit_month')->nullable();
            $table->smallInteger('limit_year')->nullable();

            $table->string('desc')->nullable();
            $table->string('img')->nullable();

            $table->foreignId('shop_id')->constrained();

            $table->unique(['name','shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
