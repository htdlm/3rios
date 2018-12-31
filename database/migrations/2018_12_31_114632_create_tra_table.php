<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTraTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tra', function (Blueprint $table) {
            $table->increments('TraId');
            $table->string('NomTra');
            $table->string('ConTra');
            $table->text('DirTra');
            $table->string('TelTra');
            $table->string('NexTra')->nullable();
            $table->string('EmaTra')->unique();
            $table->string('RfcTra');
            $table->string('ObsTra')->nullable();
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
        Schema::dropIfExists('tra');
    }
}
