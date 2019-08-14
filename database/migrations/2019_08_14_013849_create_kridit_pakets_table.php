<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKriditPaketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kridit_pakets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kode');
            $table->integer('harga_cash');
            $table->integer('uang_muka');
            $table->integer('jumlah_cicilan');
            $table->double('bunga');
            $table->double('nilai_cicilan');
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
        Schema::dropIfExists('kridit_pakets');
    }
}
