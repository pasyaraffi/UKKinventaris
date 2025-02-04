<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lokasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_lokasi';
    protected $primaryKey = 'id_lokasi';

    protected $fillable = [
        'kode_lokasi',
        'nama_lokasi',
        'keterangan',
    ];

    public function mutasiLokasis()
    {
        return $this->hasMany(MutasiLokasi::class, 'id_lokasi');
    }
}
