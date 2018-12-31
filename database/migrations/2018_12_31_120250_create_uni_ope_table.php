<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniOpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        //No tiene modelo
        Schema::create('uni_ope', function (Blueprint $table) {
            $table->increments('UniOpeId');
            $table->integer('UniId')->unsigned();
            $table->integer('OpeId')->unsigned();
            $table->string('ObsUniOpe')->nullable();
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
        Schema::dropIfExists('uni_ope');
    }
}
