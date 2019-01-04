<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFinanzasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fin', function (Blueprint $table) {
            $table->increments('FinId');
            $table->integer('MovId')->unsigned();
            $table->double('ImpFin');
            $table->float('IvaFin');
            $table->float('RetFin');
            $table->double('TotFin');
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
        Schema::dropIfExists('fin');
    }
}
