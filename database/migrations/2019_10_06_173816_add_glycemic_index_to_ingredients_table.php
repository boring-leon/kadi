<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddGlycemicIndexToIngredientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->tinyInteger('glycemic_index')->nullable();
        });

        Schema::table('user_ingredients', function (Blueprint $table) {
            $table->tinyInteger('glycemic_index')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ingredients', function (Blueprint $table) {
            $table->dropColumn('glycemic_index');
        });

        Schema::table('user_ingredients', function (Blueprint $table) {
            $table->dropColumn('glycemic_index');
        });
    }
}
