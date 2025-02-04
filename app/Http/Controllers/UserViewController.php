<?php

namespace App\Http\Controllers;

use App\Models\KategoriAsset;
use App\Models\SubKategoriAsset;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\Depresiasi;
use App\Models\MasterBarang;
use App\Models\Distributor;
use App\Models\Pengadaan;
use App\Models\Lokasi;
use App\Models\MutasiLokasi;
use App\Models\Opname;
use App\Models\HitungDepresiasi;

class UserViewController extends Controller
{
    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function kategoriAsset()
    {
        $data = KategoriAsset::all();
        return view('user.kategori_asset', compact('data'));
    }

    public function subKategoriAsset()
    {
        $data = SubKategoriAsset::with('kategoriAsset')->get();
        return view('user.sub_kategori_asset', compact('data'));
    }

    public function merk()
    {
        $data = Merk::all();
        return view('user.merk', compact('data'));
    }

    public function satuan()
    {
        $data = Satuan::all();
        return view('user.satuan', compact('data'));
    }

    public function depresiasi()
    {
        $data = Depresiasi::all();
        return view('user.depresiasi', compact('data'));
    }

    public function masterBarang()
    {
        $data = MasterBarang::all();
        return view('user.master_barang', compact('data'));
    }

    public function distributor()
    {
        $data = Distributor::all();
        return view('user.distributor', compact('data'));
    }

    public function pengadaan()
    {
        $data = Pengadaan::with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'])->get();
        return view('user.pengadaan', compact('data'));
    }

    public function lokasi()
    {
        $data = Lokasi::all();
        return view('user.lokasi', compact('data'));
    }

    public function mutasiLokasi()
    {
        $data = MutasiLokasi::with(['lokasi', 'pengadaan'])->get();
        return view('user.mutasi_lokasi', compact('data'));
    }

    public function opname()
    {
        $data = Opname::with('pengadaan')->get();
        return view('user.opname', compact('data'));
    }

    public function hitungDepresiasi()
    {
        $data = HitungDepresiasi::with('pengadaan')->get();
        return view('user.hitung_depresiasi', compact('data'));
    }
} 