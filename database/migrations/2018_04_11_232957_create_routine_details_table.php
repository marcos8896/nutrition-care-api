<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoutineDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {   
        Schema::create('routine_details', function (Blueprint $table) {
            $table->integer('routine_id')->unsigned()->index();
            $table->foreign('routine_id')->references('id')->on('routines');

            $table->integer('exercise_id')->unsigned()->index();
            $table->foreign('exercise_id')->references('id')->on('exercises');
            
            $table->integer('day_id')->unsigned()->index();
            $table->foreign('day_id')->references('id')->on('days');

            $table->text('series');
            $table->text('reps');
            $table->text('description');

            $table->primary(['routine_id', 'exercise_id', 'day_id']);
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
        Schema::dropIfExists('routine_details');
    }
}
