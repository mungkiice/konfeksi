<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('konfeksi_id')->unsigned();
            $table->string('nama');
            $table->text('deskripsi');
            $table->string('gambar');
            $table->decimal('harga', 13, 0)->default(0);
            $table->timestamps();

            $table->foreign('konfeksi_id')->references('id')->on('konfeksis')->onDelete('cascade');
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
        Schema::dropIfExists('produks');
    }
}
