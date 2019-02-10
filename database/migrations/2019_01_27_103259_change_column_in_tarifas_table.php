<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeColumnInTarifasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tar_tip_uni_cli', function (Blueprint $table) {
            $table->renameColumn('CliId','LocId');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tar_tip_uni_cli', function (Blueprint $table) {
            $table->renameColumn('LocId','LocId');
        });
    }
}
