<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('description', 1000);
            $table->date('init_date');
            $table->string('schedule', 100);
            $table->string('img_offset', 100)->default();
            $table->tinyInteger('level');
            $table->tinyInteger('presencial')->default(0);
            $table->tinyInteger('public')->default(0);
            $table->tinyInteger('display')->default(0);
            $table->boolean('type')->default(0);
            $table->string('location', 500);
            $table->string('sector', 100);
            $table->smallInteger('hours')->default(0);
            $table->string('img_code', 100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
