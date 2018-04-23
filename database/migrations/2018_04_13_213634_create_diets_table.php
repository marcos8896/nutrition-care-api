<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDietsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->text('description');
            $table->float('totalCarbohydrates', 12, 2);
            $table->float('totalProteins', 12, 2);
            $table->float('totalFats', 12, 2);
            $table->float('totalCalories', 12, 2);
            $table->text('status');
            $table->date('register_date');
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
        Schema::dropIfExists('diets');
    }
}
