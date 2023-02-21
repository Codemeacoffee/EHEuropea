<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseModuleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_module', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_course')->unsigned();
            $table->string('cod_mod', 100);
            $table->foreign('id_course')->references('id')->on('course')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('cod_mod')->references('code')->on('module')
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
        Schema::dropIfExists('course_module');
    }
}
