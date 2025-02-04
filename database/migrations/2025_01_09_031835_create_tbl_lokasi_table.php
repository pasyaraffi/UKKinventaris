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
    Schema::create('tbl_lokasi', function (Blueprint $table) {
        $table->id('id_lokasi');
        $table->string('kode_lokasi', 20);
        $table->string('nama_lokasi', 50);
        $table->string('keterangan', 50)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_lokasi');
    }
};
