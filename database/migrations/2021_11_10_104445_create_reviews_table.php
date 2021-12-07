<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('content');

            $table->tinyInteger('score')->default(5);

            $table->foreignId('user_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('shop_id')
                ->constrained()->onDelete('cascade');

            $table->index(['user_id','menu_id','shop_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
