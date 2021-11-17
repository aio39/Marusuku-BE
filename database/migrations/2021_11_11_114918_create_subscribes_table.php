<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscribes', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->boolean('continue')->default(true);

            $table->timestamp('settlement_date');
            $table->timestamp('end_date');

            $table->foreignId('user_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('menu_id')
                ->constrained()->onDelete('cascade');
            $table->foreignId('shop_id')
                ->constrained()->onDelete('cascade');

            $table->unique(['user_id','menu_id','shop_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscribes');
    }
}
