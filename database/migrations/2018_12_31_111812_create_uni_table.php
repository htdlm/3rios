<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uni', function (Blueprint $table) {
            $table->increments('UniId');
            $table->string('DesUni');
            $table->string('PlaUni');
            $table->integer('TipUniId')->unsigned();
            $table->string('ObsUni')->nullable();
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
        Schema::dropIfExists('uni');
    }
}
