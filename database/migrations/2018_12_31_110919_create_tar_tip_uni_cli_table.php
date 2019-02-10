<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTarTipUniCliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tar_tip_uni_cli', function (Blueprint $table) {
            $table->increments('TarTipUniCliId');
            $table->integer('CliId')->unsigned();
            $table->integer('TipUniId')->unsigned();
            $table->integer('TipSerId')->unsigned();
            $table->string('TarTipUniCli');
            $table->string('ObsTar')->nullable();
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
        Schema::dropIfExists('tar_tip_uni_cli');
    }
}
