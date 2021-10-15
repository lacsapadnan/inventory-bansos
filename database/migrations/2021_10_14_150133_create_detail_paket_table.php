<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailPaketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_paket', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->unsignedBigInteger('id_paket_bansos');
            $table->unsignedBigInteger('id_produk');
            $table->unsignedBigInteger('qty');
            $table->timestamps();

            $table->foreign('id_paket_bansos')->references('id')->on('paket_bansos');
            $table->foreign('id_produk')->references('id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('detail_paket');
    }
}
