<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mov', function (Blueprint $table) {
            $table->increments('MovId');
            $table->date('FecCre');
            $table->date('FecAct');
            $table->date('FecSer');
            $table->date('FecSol');
            $table->date('FecRea');
            $table->integer('FasMovId')->unsigned();
            $table->integer('CliLocId')->unsigned();
            $table->string('RefCli'); //No hay relacion entre llaves
            $table->string('ObsMov')->nullable();
            $table->float('KilBru');
            $table->float('KilNet');
            $table->integer('NumTar');
            $table->integer('AdiId1')->unsigned()->nullable();
            $table->integer('AdiId2')->unsigned()->nullable();
            $table->integer('AdiId3')->unsigned()->nullable();
            $table->integer('UseId1')->unsigned();
            $table->integer('SemSol')->unsigned();
            $table->integer('SemRea')->unsigned();
            $table->integer('SemSer')->unsigned();
            $table->double('FacTar');
            $table->double('FacTarTot');
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
        Schema::dropIfExists('mov');
    }
}
