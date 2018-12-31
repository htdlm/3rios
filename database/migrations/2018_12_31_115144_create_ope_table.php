<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOpeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ope', function (Blueprint $table) {
            $table->increments('OpeId');
            $table->string('DesOpe');
            $table->string('NomOpe');
            $table->text('DirOpe');
            $table->string('TelOpe');
            $table->string('EmaOpe')->unique();
            $table->string('NexOpe');
            $table->string('NssOpe');
            $table->string('ConEmeOpe');
            $table->string('TelEmeOpe');
            $table->string('ObsOpe')->nullable();
            $table->integer('ClaId')->unsigned();
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
        Schema::dropIfExists('ope');
    }
}
