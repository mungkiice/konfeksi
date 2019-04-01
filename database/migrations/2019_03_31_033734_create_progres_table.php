<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProgresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('progres', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('pesanan_id')->unsigned();
            $table->enum('kategori', [
                ''
            ]);
            $table->string('informasi');
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
        Schema::dropIfExists('progres');
    }
}
