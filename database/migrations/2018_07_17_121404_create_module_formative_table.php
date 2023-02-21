<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModuleFormativeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('module_formative', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cod_mod', 100);
            $table->string('cod_unitformative', 100);
            $table->foreign('cod_mod')
                ->references('code')->on('module')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('cod_unitformative')
                ->references('code')->on('unit_formative')
                ->onUpdate('cascade')
                ->onDelete('cascade');
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
        Schema::dropIfExists('module_formative');
    }
}
