<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseDepartureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_departure', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_course')->unsigned();
            $table->integer('id_departure')->unsigned();
            $table->foreign('id_course')->references('id')->on('course')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('id_departure')->references('id')->on('professional_departure')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_departure');
    }
}
