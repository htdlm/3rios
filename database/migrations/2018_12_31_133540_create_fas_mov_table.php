<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFasMovTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fas_mov', function (Blueprint $table) {
            $table->increments('FasMovId');
            $table->string('FasMov');
            $table->boolean('PriFas')->default(false);
            $table->string('ObsFasMov')->nullable();
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
        Schema::dropIfExists('fas_mov');
    }
}
