<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class EditUniOpeTraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('uni_ope_tra', function (Blueprint $table) {
          $table->integer('OpeId')->unsigned()
          ->nullable()
          ->change();

          $table->float('CosUniOpeTra')->nullable()
          ->change();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('uni_ope_tra', function (Blueprint $table) {
          $table->integer('OpeId')->unsigned()->change();

          $table->float('CosUniOpeTra')->change();
      });
    }
}
