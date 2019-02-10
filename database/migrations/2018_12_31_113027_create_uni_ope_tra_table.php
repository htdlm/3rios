<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniOpeTraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uni_ope_tra', function (Blueprint $table) {
            $table->increments('UniOpeTraId');
            $table->integer('TraId')->unsigned();
            $table->integer('UniId')->unsigned();
            $table->integer('OpeId')->unsigned();
            $table->float('CosUniOpeTra');
            $table->string('ObsUniOpeTra')->nullable();
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
        Schema::dropIfExists('uni_ope_tra');
    }
}
