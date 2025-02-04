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
    Schema::create('tbl_distributor', function (Blueprint $table) {
        $table->id('id_distributor');
        $table->string('nama_distributor', 50);
        $table->string('alamat', 50)->nullable();
        $table->string('no_telp', 15)->nullable();
        $table->string('email', 30)->nullable();
        $table->string('keterangan', 45)->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_distributor');
    }
};
