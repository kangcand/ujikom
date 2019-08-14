<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBeliKriditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('beli_kridits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->unsignedInteger('id_kridit_paket');
            $table->unsignedInteger('id_pembeli');
            $table->unsignedInteger('id_motor');
            $table->date('tanggal');
            $table->string('foto_ktp');
            $table->string('foto_kk');
            $table->string('foto_slipgaji');
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
        Schema::dropIfExists('beli_kridits');
    }
}
