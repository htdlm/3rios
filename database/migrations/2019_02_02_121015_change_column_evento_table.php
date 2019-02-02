<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnEventoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eve', function (Blueprint $table) {
            $table->dateTime('FecAct')->change();
            $table->dateTime('FecSol')->change();
            $table->dateTime('FecRea')->change();
            $table->dateTime('FecCreEve')->before('FecRea')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('eve', function (Blueprint $table) {
          $table->date('FecAct')->change();
          $table->date('FecSol')->change();
          $table->date('FecRea')->change();
          $table->date('FecCreEve')->change();
        });
    }
}
