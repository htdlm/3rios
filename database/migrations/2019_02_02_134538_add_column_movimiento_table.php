<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mov', function (Blueprint $table) {
            $table->double('AdiValId1')->nullable()->after('AdiId1');
            $table->double('AdiValId2')->nullable()->after('AdiId2');
            $table->double('AdiValId3')->nullable()->after('AdiId3');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mov', function (Blueprint $table) {
            $table->dropColumn('AdiValId1');
            $table->dropColumn('AdiValId2');
            $table->dropColumn('AdiValId3');
        });
    }
}
