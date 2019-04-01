<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePenawaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('penawarans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pesanan_id')->unsigned();
            $table->date('tenggat_waktu');
            $table->decimal('biaya', 13, 0);
            $table->text('deskripsi');
            $table->enum('status', ['terkirim', 'ditolak', 'diterima'])->default('terkirim');
            $table->timestamps();

            $table->foreign('pesanan_id')->references('id')->on('pesanans');
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
        Schema::dropIfExists('penawarans');
    }
}
