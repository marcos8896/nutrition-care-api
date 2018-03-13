<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBodyAreaExercisePivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('body_area_exercise', function (Blueprint $table) {
            $table->integer('body_area_id')->unsigned()->index();
            $table->foreign('body_area_id')->references('id')->on('body_areas')->onDelete('cascade');
            $table->integer('exercise_id')->unsigned()->index();
            $table->foreign('exercise_id')->references('id')->on('exercises')->onDelete('cascade');
            $table->primary(['body_area_id', 'exercise_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('body_area_exercise');
    }
}
