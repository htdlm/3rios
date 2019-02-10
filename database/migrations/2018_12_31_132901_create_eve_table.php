<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eve', function (Blueprint $table) {
            $table->increments('EveId');
            $table->integer('MovId')->unsigned();
            $table->date('FecAct');
            $table->date('FecSol');
            $table->date('FecRea');
            $table->integer('FasMovId')->unsigned();
            $table->string('ObsEve')->nullable();
            $table->integer('AdiId')->unsigned()->nullable();
            $table->integer('UseId')->unsigned();
            $table->integer('SemAct');
            $table->integer('SemSol');
            $table->integer('SemRea');
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
        Schema::dropIfExists('eve');
    }
}
