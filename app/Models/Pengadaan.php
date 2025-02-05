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
        $lamaBulan = $this->depresiasi->lama_depresiasi ?? 4;
        return $this->nilai_barang / $lamaBulan;
    }

    public function getDetailPenyusutan()
    {
        $lamaBulan = $this->depresiasi->lama_depresiasi ?? 4;
        $nilaiPenyusutanPerBulan = $this->hitungDepresiasi();
        $nilaiSisa = $this->nilai_barang;
        $detail = [];

        for ($i = 1; $i <= $lamaBulan; $i++) {
            $detail[] = [
                'bulan' => $i,
                'nilai_penyusutan' => $nilaiPenyusutanPerBulan,
                'nilai_sisa' => $i == $lamaBulan ? 0 : max(0, $nilaiSisa - ($nilaiPenyusutanPerBulan * $i))
            ];
        }

        return $detail;
    }

    public function getNilaiDepresiasiPerBulan($bulanKe)
    {
        $lamaBulan = $this->depresiasi->lama_depresiasi ?? 4;
        $nilaiPenyusutan = $this->nilai_barang / $lamaBulan;
        $nilaiSisa = $this->nilai_barang - ($nilaiPenyusutan * $bulanKe);
        
        // Pastikan nilai pada bulan terakhir adalah 0
        if ($bulanKe >= $lamaBulan) {
            return 0;
        }
        
        return max(0, $nilaiSisa);
    }

    public function hitungNilaiPenyusutan()
    {
        return round($this->nilai_barang / ($this->depresiasi->lama_depresiasi ?? 4));
    }

    public function hitungNilaiSisaBulan($bulanKe)
    {
        $penyusutan = $this->hitungNilaiPenyusutan();
        $nilaiSisa = $this->nilai_barang - ($penyusutan * (float)$bulanKe);
        return max(0, $nilaiSisa);
    }
}
