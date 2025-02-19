<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDepresiasiBarangToTblPengadaan extends Migration
{
    public function up()
    {
        Schema::table('tbl_pengadaan', function (Blueprint $table) {
            $table->decimal('depresiasi_barang', 15, 2)->nullable()->after('nilai_barang');
        });
    }

    public function down()
    {
        Schema::table('tbl_pengadaan', function (Blueprint $table) {
            $table->dropColumn('depresiasi_barang');
        });
    }
}
