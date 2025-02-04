<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Merk extends Model
{
    use HasFactory;

    protected $table = 'tbl_merk';
    protected $primaryKey = 'id_merk';

    protected $fillable = [
        'merk',
        'keterangan',
    ];

    public function pengadaans()
    {
        return $this->hasMany(Pengadaan::class, 'id_merk');
    }
}
