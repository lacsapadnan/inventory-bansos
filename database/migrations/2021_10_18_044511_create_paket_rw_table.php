<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaketRwTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paket_rw', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_paket_bansos')->unsigned();
            $table->bigInteger('id_rw')->unsigned();
            $table->bigInteger('stok');
            $table->timestamps();
            $table->foreign('id_paket_bansos')->references('id')->on('paket_bansos')->onDelete('cascade');
            $table->foreign('id_rw')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paket_rw');
    }
}
