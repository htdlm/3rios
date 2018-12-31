<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagCxcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pag_cxc', function (Blueprint $table) {
            $table->increments('PagCxcId');
            $table->integer('NumPag');
            $table->string('FacCxcNum');
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
        Schema::dropIfExists('pag_cxc');
    }
}
