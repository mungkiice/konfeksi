<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonfirmasiPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konfirmasi_pembayarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pesanan_id')->unsigned();
            $table->string('gambar');
            $table->timestamps();
            
            $table->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('konfirmasi_pembayarans');
    }
}
