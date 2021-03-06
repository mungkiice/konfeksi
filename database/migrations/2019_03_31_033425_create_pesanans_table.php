<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->bigInteger('produk_id')->unsigned();
            $table->string('kode_pesanan')->unique();
            $table->date('tanggal_selesai')->nullable();;
            $table->decimal('biaya', 13, 0)->default(0);
            $table->text('catatan');
            $table->string('file_desain');
            $table->text('jumlah');
            $table->string('alamat')->nullable();
            $table->integer('kota_id')->nullable();
            $table->string('kurir')->nullable();
            $table->string('nomor_resi')->nullable();
            $table->string('snap_token')->nullable();
            $table->timestamps();
        
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('produk_id')->references('id')->on('produks')->onDelete('cascade');
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
        Schema::dropIfExists('pesanans');
    }
}
