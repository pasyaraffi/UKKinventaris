<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBarang extends Model
{
    use HasFactory;

    // Nama tabel di database
    protected $table = 'tbl_master_barang';

    // Primary key
    protected $primaryKey = 'id_barang';

    // Apakah primary key auto-increment?
    public $incrementing = true;

    // Tipe data primary key
    protected $keyType = 'int';

    // Timestamps (created_at dan updated_at)
    public $timestamps = false;

    // Kolom yang dapat diisi
    protected $fillable = [
        'kode_barang',
        'nama_barang',
        'spesifikasi_teknis',
    ];
}
