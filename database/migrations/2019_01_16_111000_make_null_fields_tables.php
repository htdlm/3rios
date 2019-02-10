<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeNullFieldsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('adi', function (Blueprint $table) {
          $table->string('ObsAdi')->nullable()->change();
      });

      Schema::table('cli', function (Blueprint $table) {
          $table->text('DirCli')->nullable()->change();
          $table->string('TelCli')->nullable()->change();
          $table->string('NexCli')->nullable()->change();
          $table->string('EmaCli')->nullable()->change();
          $table->string('RfcCli')->nullable()->change();
          $table->float('DisCli')->nullable()->change();
      });


      Schema::table('eve', function (Blueprint $table) {
            $table->date('FecAct')->nullable()->change();
            $table->date('FecSol')->nullable()->change();
            $table->date('FecRea')->nullable()->change();
            $table->integer('SemAct')->nullable()->change();
            $table->integer('SemSol')->nullable()->change();
                $table->integer('SemRea')->nullable()->change();
                $table->date('FecCreEve')->nullable()->change();
            });

            Schema::table('evi', function (Blueprint $table) {
                $table->integer('NumEvi')->nullable()->change();
                $table->string('DesEvi')->nullable()->change();
                $table->date('FecPre')->nullable()->change();
                $table->date('FecRet')->nullable()->change();
            });

            Schema::table('fac_cxc', function (Blueprint $table) {
                $table->string('ConFac')->nullable()->change();
                $table->date('FecCreFac')->nullable()->change();
                $table->date('FecFac')->nullable()->change();
                $table->date('FecPre')->nullable()->change();
            });

            Schema::table('fac_cxp', function (Blueprint $table) {
                $table->string('ConFac')->nullable()->change();
                $table->date('FecCreFac')->nullable()->change();
                $table->date('FecFac')->nullable()->change();
                $table->date('FecPre')->nullable()->change();
            });

            Schema::table('loc', function (Blueprint $table) {
                $table->string('DesLoc')->nullable()->change();
                $table->text('IndLoc')->nullable()->change();
                $table->string('NomLoc')->nullable()->change();
                $table->string('ConLoc')->nullable()->change();
                $table->text('DirLoc')->nullable()->change();
                $table->string('TelLoc')->nullable()->change();
                $table->string('EmaLoc')->nullable()->change();
                $table->string('RfcLoc')->nullable()->change();
                $table->float('DisLoc')->nullable()->change();
            });

            Schema::table('mov', function (Blueprint $table) {
                $table->date('FecCre')->nullable()->change();
                $table->date('FecAct')->nullable()->change();
                $table->date('FecSer')->nullable()->change();
                $table->date('FecSol')->nullable()->change();
                $table->date('FecRea')->nullable()->change();
            });

            Schema::table('ope', function (Blueprint $table) {
                $table->string('DesOpe')->nullable()->change();
                $table->text('DirOpe')->nullable()->change();
                $table->string('TelOpe')->nullable()->change();
                $table->string('EmaOpe')->nullable()->change();;
                $table->string('NexOpe')->nullable()->change();
                $table->string('NssOpe')->nullable()->change();
                $table->string('ConEmeOpe')->nullable()->change();
                $table->string('TelEmeOpe')->nullable()->change();
            });

            Schema::table('pag_cxc', function (Blueprint $table) {
                $table->integer('NumPag')->nullable()->change();
                $table->date('FecPag')->nullable()->change();
                $table->string('RefPag')->nullable()->change();
            });

            Schema::table('pag_cxp', function (Blueprint $table) {
                $table->integer('NumPag')->nullable()->change();
                $table->date('FecPag')->nullable()->change();
                $table->string('RefPag')->nullable()->change();
            });

            Schema::table('tra', function (Blueprint $table) {
                $table->string('ConTra')->nullable()->change();
                $table->text('DirTra')->nullable()->change();
                $table->string('TelTra')->nullable()->change();
                $table->string('EmaTra')->nullable()->change();
                $table->string('RfcTra')->nullable()->change();
            });

            Schema::table('uni', function (Blueprint $table) {
                $table->integer('TraId')->unsigned()->nullable()->change();
            });

            Schema::table('uni_ope_tra', function (Blueprint $table) {
                $table->integer('TraId')->unsigned()->nullable()->change();
            });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::table('adi', function (Blueprint $table) {
          $table->string('ObsAdi')->change();
      });

      Schema::table('cli', function (Blueprint $table) {
          $table->text('DirCli')->change();
          $table->string('TelCli')->change();
          $table->string('NexCli')->change();
          $table->string('EmaCli')->change();
          $table->string('RfcCli')->change();
          $table->float('DisCli')->change();
      });
    }
}
