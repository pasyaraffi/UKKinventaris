<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Depresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_depresiasi'; // Pastikan nama tabel sudah benar
    protected $primaryKey = 'id_depresiasi';

    protected $fillable = [
        'lama_depresiasi',
        'keterangan',
    ];

    public function pengadaans()
    {
        return $this->hasMany(Pengadaan::class, 'id_depresiasi');
    }
}
