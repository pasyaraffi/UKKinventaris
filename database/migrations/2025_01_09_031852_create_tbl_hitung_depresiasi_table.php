<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_hitung_depresiasi', function (Blueprint $table) {
            $table->id('id_hitung_depresiasi');
            $table->unsignedBigInteger('id_pengadaan');
            $table->date('tgl_hitung_depresiasi');
            $table->string('bulan', 10);
            $table->integer('durasi');
            $table->integer('nilai_barang');
            $table->timestamps();

            $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_hitung_depresiasi');
    }
};