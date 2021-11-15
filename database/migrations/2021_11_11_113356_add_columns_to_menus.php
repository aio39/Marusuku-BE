<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->boolean('vanish')->default(false);
            $table->timestamp('vanish_at')->nullable();

            $table->smallInteger('limit_day_amount')->nullable();
            $table->smallInteger('limit_week_amount')->nullable();
            $table->smallInteger('limit_month_amount')->nullable();
            $table->smallInteger('limit_year_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('menus', function (Blueprint $table) {
            $table->dropColumn('vanish');
            $table->dropColumn('vanish_at');
        });
    }
}
