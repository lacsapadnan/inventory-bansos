<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyaluranBansosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penyaluran_bansos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_penerima');
            $table->bigInteger('id_paket_rw')->unsigned();
            $table->timestamps();


            $table->foreign('id_paket_rw')->references('id')->on('paket_rw');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('penyaluran_bansos');
    }
}
