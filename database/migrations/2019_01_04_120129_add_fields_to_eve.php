<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToEve extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eve', function (Blueprint $table) {
             $table->date('FecCreEve');
             $table->string('RefCli');
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
              $table->dropColumn('FecCreEve');
              $table->dropColumn('RefCli');
        });
    }
}
