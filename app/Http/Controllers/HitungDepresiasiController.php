<?php

namespace App\Http\Controllers;

use App\Models\HitungDepresiasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class HitungDepresiasiController extends Controller
{
    // Menampilkan semua data Hitung Depresiasi
    public function index()
    {
        $depresiasi = HitungDepresiasi::with('pengadaan')->get();
        return view('admin.hitung_depresiasi.index', compact('depresiasi'));
    }

    // Menampilkan form untuk menambah data baru
    public function create()
    {
        $pengadaan = Pengadaan::all(); // Mengambil semua data pengadaan
        return view('admin.hitung_depresiasi.create', compact('pengadaan'));
    }

    // Menyimpan data baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ]);

        $hitungDepresiasi = HitungDepresiasi::create($request->all());

        // Hitung nilai penyusutan
        $nilaiPenyusutan = $hitungDepresiasi->hitungNilaiPenyusutan();

        return redirect()->route('hitung_depresiasi.index')
            ->with('success', 'Data hitung depresiasi berhasil ditambahkan. Nilai penyusutan per bulan: ' . number_format($nilaiPenyusutan));
    }

    // Menampilkan form untuk mengedit data
    public function edit($id)
    {
        $depresiasi = HitungDepresiasi::findOrFail($id);
        $pengadaan = Pengadaan::all();
        return view('admin.hitung_depresiasi.edit', compact('depresiasi', 'pengadaan'));
    }

    // Mengupdate data di database
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'tgl_hitung_depresiasi' => 'required|date',
            'bulan' => 'required|string|max:10',
            'durasi' => 'required|integer|min:1',
            'nilai_barang' => 'required|integer|min:0',
        ]);

        $depresiasi = HitungDepresiasi::findOrFail($id);
        $depresiasi->update($request->all());
        return redirect()->route('hitung_depresiasi.index')->with('success', 'Data hitung depresiasi berhasil diupdate.');
    }

    // Menghapus data dari database
    public function destroy($id)
    {
        $depresiasi = HitungDepresiasi::findOrFail($id);
        $depresiasi->delete();
        return redirect()->route('hitung_depresiasi.index')->with('success', 'Data hitung depresiasi berhasil dihapus.');
    }

    public function show($id)
    {
        $depresiasi = HitungDepresiasi::with('pengadaan')->findOrFail($id);
        return view('admin.hitung_depresiasi.show', compact('depresiasi'));
    }
}
