<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCliTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cli', function (Blueprint $table) {
            $table->increments('CliId');
            $table->string('NomCli');
            $table->string('ConCli');
            $table->string('LocCli');
            $table->text('DirCli');
            $table->string('TelCli');
            $table->string('NexCli');
            $table->string('EmaCli')->unique();
            $table->string('RfcCli');
            $table->float('DisCli');
            $table->string('ObsCli')->nullable();
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
        Schema::dropIfExists('cli');
    }
}
