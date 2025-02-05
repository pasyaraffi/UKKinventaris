<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pengadaan;
use App\Models\MasterBarang;
use App\Models\Depresiasi;
use App\Models\Merk;
use App\Models\Satuan;
use App\Models\SubKategoriAsset;
use App\Models\Distributor;
use Illuminate\Support\Facades\Validator;

class PengadaanController extends Controller
{
    // Menampilkan semua data Pengadaan
    public function index()
    {
        $data = Pengadaan::with(['masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'])->get();
        return view('admin.pengadaan.index', compact('data'));
    }

    // Menampilkan form untuk membuat Pengadaan baru
    public function create()
    {
        // Menyediakan data untuk dropdown
        $masterBarang = MasterBarang::all();
        $depresiasi = Depresiasi::all();
        $merk = Merk::all();
        $satuan = Satuan::all();
        $subKategoriAsset = SubKategoriAsset::all();
        $distributor = Distributor::all();

        return view('admin.pengadaan.create', compact('masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'));
    }

    // Menyimpan data Pengadaan baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'id_master_barang' => 'required|exists:tbl_master_barang,id_barang',
            'id_depresiasi' => 'required|exists:tbl_depresiasi,id_depresiasi',
            'id_merk' => 'required|exists:tbl_merk,id_merk',
            'id_satuan' => 'required|exists:tbl_satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|exists:tbl_sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|exists:tbl_distributor,id_distributor',
            'kode_pengadaan' => 'required|string|max:20',
            'no_invoice' => 'required|string|max:20',
            'no_seri_barang' => 'required|string|max:50',
            'tahun_produksi' => 'required|string|max:5',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer|min:0',
            'nilai_barang' => 'required|integer|min:0',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:50',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('pengadaan.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Membuat data pengadaan baru
        $pengadaan = new Pengadaan($request->all());
        $pengadaan->depresiasi_barang = $pengadaan->hitungDepresiasi();
        $pengadaan->save();

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit Pengadaan
    public function edit($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);

        // Menyediakan data untuk dropdown
        $masterBarang = MasterBarang::all();
        $depresiasi = Depresiasi::all();
        $merk = Merk::all();
        $satuan = Satuan::all();
        $subKategoriAsset = SubKategoriAsset::all();
        $distributor = Distributor::all();

        return view('admin.pengadaan.edit', compact('pengadaan', 'masterBarang', 'depresiasi', 'merk', 'satuan', 'subKategoriAsset', 'distributor'));
    }

    // Memperbarui data Pengadaan
    public function update(Request $request, $id)
    {
        $pengadaan = Pengadaan::findOrFail($id);

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'id_master_barang' => 'required|exists:master_barang,id_master_barang',
            'id_depresiasi' => 'required|exists:depresiasi,id_depresiasi',
            'id_merk' => 'required|exists:merk,id_merk',
            'id_satuan' => 'required|exists:satuan,id_satuan',
            'id_sub_kategori_asset' => 'required|exists:sub_kategori_asset,id_sub_kategori_asset',
            'id_distributor' => 'required|exists:distributor,id_distributor',
            'kode_pengadaan' => 'required|string|max:20',
            'no_invoice' => 'required|string|max:20',
            'no_seri_barang' => 'required|string|max:50',
            'tahun_produksi' => 'required|string|max:5',
            'tgl_pengadaan' => 'required|date',
            'harga_barang' => 'required|integer|min:0',
            'nilai_barang' => 'required|integer|min:0',
            'fb' => 'required|in:0,1',
            'keterangan' => 'nullable|string|max:50',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('pengadaan.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Memperbarui data pengadaan
        $pengadaan->fill($request->all());
        $pengadaan->depresiasi_barang = $pengadaan->hitungDepresiasi();
        $pengadaan->save();

        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil diperbarui!');
    }

    public function showDepresiasi($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $depresiasiBulanan = [];

        for ($i = 1; $i <= ($pengadaan->depresiasi->bulan ?? 60); $i++) {
            $depresiasiBulanan[] = [
                'bulan' => $i,
                'nilai' => $pengadaan->getNilaiDepresiasiPerBulan($i)
            ];
        }
        return view('admin.pengadaan.depresiasi', compact('pengadaan', 'depresiasiBulanan'));
    }

    // Menghapus Pengadaan
    public function destroy($id)
    {
        $pengadaan = Pengadaan::findOrFail($id);
        $pengadaan->delete();
        return redirect()->route('pengadaan.index')->with('success', 'Pengadaan berhasil dihapus!');
    }
}
