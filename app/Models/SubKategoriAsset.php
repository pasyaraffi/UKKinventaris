<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubKategoriAsset extends Model
{
    use HasFactory;

    protected $table = 'tbl_sub_kategori_asset';
    protected $primaryKey = 'id_sub_kategori_asset';

    protected $fillable = [
        'id_kategori_asset',
        'kode_sub_kategori_asset',
        'sub_kategori_asset',
    ];

    public function kategoriAsset()
    {
        return $this->belongsTo(KategoriAsset::class, 'id_kategori_asset');
    }
}
