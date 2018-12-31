<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loc', function (Blueprint $table) {
            $table->increments('LocId');
            $table->integer('CliId')->unsigned();
            $table->string('DesLoc');
            $table->text('IndLoc'); //indicaciones
            $table->string('NomLoc');
            $table->string('ConLoc');
            $table->text('DirLoc');
            $table->string('TelLoc');
            $table->string('NexLoc')->nullable();
            $table->string('EmaLoc')->unique();
            $table->string('RfcLoc');
            $table->float('DisLoc');
            $table->string('ObsLoc')->nullable();
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
        Schema::dropIfExists('loc');
    }
}
