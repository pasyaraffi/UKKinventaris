<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HitungDepresiasi extends Model
{
    use HasFactory;

    protected $table = 'tbl_hitung_depresiasi';
    protected $primaryKey = 'id_hitung_depresiasi';

    protected $fillable = [
        'id_pengadaan',
        'tgl_hitung_depresiasi',
        'bulan',
        'durasi',
        'nilai_barang',
    ];

    public function pengadaan()
    {
        return $this->belongsTo(Pengadaan::class, 'id_pengadaan');
    }

    public function hitungNilaiPenyusutan()
    {
        return round($this->nilai_barang / $this->durasi);
    }

    public function hitungNilaiSisaBulan($bulanKe)
    {
        $penyusutan = $this->hitungNilaiPenyusutan();
        $nilaiSisa = $this->nilai_barang - ($penyusutan * (float)$bulanKe);
        return max(0, $nilaiSisa);
    }
}

