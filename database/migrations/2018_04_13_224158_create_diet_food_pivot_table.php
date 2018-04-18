<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietFoodPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diet_food', function (Blueprint $table) {
            $table->integer('diet_id')->unsigned()->index();
            $table->foreign('diet_id')->references('id')->on('diets')->onDelete('cascade');
            $table->integer('food_id')->unsigned()->index();
            $table->foreign('food_id')->references('id')->on('foods')->onDelete('cascade');
            $table->primary(['diet_id', 'food_id', 'description']);

            $table->float('calories', 12, 2);
            $table->float('carbohydrates', 12, 2);
            $table->float('fats', 12, 2);
            $table->float('proteins', 12, 2);
            $table->float('desiredGrams', 12, 2);
            $table->string('description');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('diet_food');
    }
}
