<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagCxpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pag_cxp', function (Blueprint $table) {
            $table->increments('PagCxpId');
            $table->integer('NumPag');
            $table->string('FacCxpNum');
            $table->double('MonPag');
            $table->date('FecPag');
            $table->string('RefPag');
            $table->string('ObsPag')->nullable();
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
        Schema::dropIfExists('pag_cxp');
    }
}
