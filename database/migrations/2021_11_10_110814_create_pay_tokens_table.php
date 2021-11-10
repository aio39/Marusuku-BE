<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayTokensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pay_tokens', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->uuid('uuid')->default(\Illuminate\Support\Str::uuid());

            $table->foreignId('user_id')->constrained();
            $table->foreignId('menu_id')->constrained();
            $table->foreignId('shop_id')->constrained();

            // TODO 재활용 가능?
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pay_tokens');
    }
}
