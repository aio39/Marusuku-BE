<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('desc')->nullable();
            $table->string('phone')->nullable();
            $table->string('homepage')->nullable();
//            $table->string('category')->nullable();
//            $table->string('review')->nullable();
//            $table->string('영업일')->nullable();
            $table->string('address');
            $table->string('address2')->nullable();
            $table->integer('score_total')->default(0);
            $table->integer('score_count')->default(0);
            $table->point('position',4326); // google map 3857
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
