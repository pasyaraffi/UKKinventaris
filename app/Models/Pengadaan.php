<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengadaan extends Model
{
    use HasFactory;

    protected $table = 'tbl_pengadaan';
    protected $primaryKey = 'id_pengadaan';

    protected $fillable = [
        'id_master_barang',
        'id_depresiasi',
        'id_merk',
        'id_satuan',
        'id_sub_kategori_asset',
        'id_distributor',
        'kode_pengadaan',
        'no_invoice',
        'no_seri_barang',
        'tahun_produksi',
        'tgl_pengadaan',
        'harga_barang',
        'nilai_barang',
        'depresiasi_barang',
        'fb',
        'keterangan',
    ];

    public function masterBarang()
    {
        return $this->belongsTo(MasterBarang::class, 'id_master_barang');
    }

    public function depresiasi()
    {
        return $this->belongsTo(Depresiasi::class, 'id_depresiasi'); // Pastikan relasi sudah benar
    }

    public function merk()
    {
        return $this->belongsTo(Merk::class, 'id_merk');
    }

    public function satuan()
    {
        return $this->belongsTo(Satuan::class, 'id_satuan');
    }

    public function subKategoriAsset()
    {
        return $this->belongsTo(SubKategoriAsset::class, 'id_sub_kategori_asset');
    }

    public function distributor()
    {
        return $this->belongsTo(Distributor::class, 'id_distributor');
    }

    public function hitungDepresiasi()
    {
        $lamaBulan = $this->depresiasi->bulan ?? 60; // Default 60 bulan jika tidak ada
        return $this->harga_barang / $lamaBulan;
    }

    public function getNilaiDepresiasiPerBulan($bulanKe)
    {
        $nilaiDepresiasi = $this->hitungDepresiasi();
        $nilaiAwal = $this->harga_barang;

        for ($i = 1; $i <= $bulanKe; $i++) {
            $nilaiAwal -= $nilaiDepresiasi;
        }

        return max(0, $nilaiAwal); // Tidak boleh kurang dari 0
    }

    public function hitungNilaiPenyusutan()
    {
        return round($this->harga_barang / ($this->depresiasi->lama_depresiasi ?? 60));
    }

    public function hitungNilaiSisaBulan($bulanKe)
    {
        $penyusutan = $this->hitungNilaiPenyusutan();
        $nilaiSisa = $this->harga_barang - ($penyusutan * (float)$bulanKe);
        return max(0, $nilaiSisa);
    }
}
