<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblPengadaanTable extends Migration
{
    /**
     * Jalankan migration.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_pengadaan', function (Blueprint $table) {
            $table->id('id_pengadaan');
            $table->unsignedBigInteger('id_master_barang');
            $table->unsignedBigInteger('id_depresiasi');
            $table->unsignedBigInteger('id_merk');
            $table->unsignedBigInteger('id_satuan');
            $table->unsignedBigInteger('id_sub_kategori_asset');
            $table->unsignedBigInteger('id_distributor');
            
            $table->string('kode_pengadaan', 20);
            $table->string('no_invoice', 20);
            $table->string('no_seri_barang', 50);
            $table->string('tahun_produksi', 5);
            $table->date('tgl_pengadaan');
            
            $table->integer('harga_barang');
            $table->integer('nilai_barang');
            
            $table->enum('fb', ['0', '1']);
            $table->string('keterangan', 50)->nullable();
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_master_barang')->references('id_barang')->on('tbl_master_barang');
            $table->foreign('id_depresiasi')->references('id_depresiasi')->on('tbl_depresiasi');
            $table->foreign('id_merk')->references('id_merk')->on('tbl_merk');
            $table->foreign('id_satuan')->references('id_satuan')->on('tbl_satuan');
            $table->foreign('id_sub_kategori_asset')->references('id_sub_kategori_asset')->on('tbl_sub_kategori_asset');
            $table->foreign('id_distributor')->references('id_distributor')->on('tbl_distributor');
        });
    }

    public function down()
    {
        // Drop tables in reverse order to handle foreign key constraints
        Schema::dropIfExists('tbl_pengadaan');
        Schema::dropIfExists('tbl_sub_kategori_asset');
        Schema::dropIfExists('tbl_satuan');
        Schema::dropIfExists('tbl_opname');
        Schema::dropIfExists('tbl_mutasi_lokasi');
        Schema::dropIfExists('tbl_merk');
        Schema::dropIfExists('tbl_master_barang');
        Schema::dropIfExists('tbl_lokasi');
        Schema::dropIfExists('tbl_kategori_asset');
        Schema::dropIfExists('tbl_hitung_depresiasi');
        Schema::dropIfExists('tbl_distributor');
        Schema::dropIfExists('tbl_depresiasi');
    }
}
