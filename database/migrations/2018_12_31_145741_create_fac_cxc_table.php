<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFacCxcTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fac_cxc', function (Blueprint $table) {
            $table->increments('FacCxcId');
            $table->string('FacCxcNum');
            $table->integer('MovId')->unsigned();
            $table->string('ConFac');
            $table->string('ObsFac')->nullable();
            $table->date('FecCreFac');
            $table->date('FecFac');
            $table->date('FecPre');
            $table->double('ImpFac');
            $table->float('IvaFac');
            $table->double('SubFac');
            $table->float('RetFac');
            $table->double('TotFac');
            $table->double('SalFac');
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
        Schema::dropIfExists('fac_cxc');
    }
}
