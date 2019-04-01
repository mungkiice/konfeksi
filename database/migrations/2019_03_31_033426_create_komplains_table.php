<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKomplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('komplains', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pesanan_id')->unsigned();
            $table->string('deskripsi');
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
        Schema::dropIfExists('komplains');
    }
}
