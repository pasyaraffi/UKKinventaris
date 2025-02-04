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
    Schema::create('tbl_mutasi_lokasi', function (Blueprint $table) {
        $table->id('id_mutasi_lokasi');
        $table->unsignedBigInteger('id_lokasi');
        $table->unsignedBigInteger('id_pengadaan');
        $table->string('flag_lokasi', 45);
        $table->string('flag_pindah', 45);
        $table->timestamps();

        $table->foreign('id_lokasi')->references('id_lokasi')->on('tbl_lokasi');
        $table->foreign('id_pengadaan')->references('id_pengadaan')->on('tbl_pengadaan');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_mutasi_lokasi');
    }
};
