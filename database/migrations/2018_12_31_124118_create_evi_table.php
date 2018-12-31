<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEviTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('evi', function (Blueprint $table) {
            $table->increments('EviId');
            $table->integer('NumEvi');
            $table->string('DesEvi');
            $table->date('FecPre');
            $table->date('FecRet');
            $table->string('ObsEvi')->nullable();
            $table->binary('ArcEvi');
            $table->integer('MovId')->nullable();
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
        Schema::dropIfExists('evi');
    }
}
