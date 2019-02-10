<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipUniTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tip_uni', function (Blueprint $table) {
            $table->increments('TipUniId');
            $table->string('DesTipUni');
            $table->float('CapMinUni');
            $table->float('CapMaxUni');
            $table->string('ObsTipUni')->nullable();
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
        Schema::dropIfExists('tip_uni');
    }
}
