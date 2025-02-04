<?php

namespace App\Http\Controllers;

use App\Models\MutasiLokasi;
use App\Models\Lokasi;
use App\Models\Pengadaan;
use Illuminate\Http\Request;

class MutasiLokasiController extends Controller
{
    // Menampilkan daftar mutasi lokasi
    public function index()
    {
        $mutasiLokasi = MutasiLokasi::with(['lokasi', 'pengadaan'])->get();
        return view('admin.mutasi_lokasi.index', compact('mutasiLokasi'));
    }

    // Menampilkan form untuk membuat mutasi lokasi baru
    public function create()
    {
        $lokasi = Lokasi::all(); // Mengambil semua data lokasi
        $pengadaan = Pengadaan::all(); // Mengambil semua data pengadaan
        return view('admin.mutasi_lokasi.create', compact('lokasi', 'pengadaan'));
    }

    // Menyimpan data mutasi lokasi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|max:45',
            'flag_pindah' => 'required|max:45',
        ]);

        // Membuat mutasi lokasi baru
        MutasiLokasi::create([
            'id_lokasi' => $request->id_lokasi,
            'id_pengadaan' => $request->id_pengadaan,
            'flag_lokasi' => $request->flag_lokasi,
            'flag_pindah' => $request->flag_pindah,
        ]);

        return redirect()->route('mutasi_lokasi.index')->with('success', 'Mutasi lokasi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit mutasi lokasi
    public function edit($id)
    {
        $mutasiLokasi = MutasiLokasi::findOrFail($id); // Mencari mutasi lokasi berdasarkan id
        $lokasi = Lokasi::all(); // Mengambil semua data lokasi
        $pengadaan = Pengadaan::all(); // Mengambil semua data pengadaan
        return view('admin.mutasi_lokasi.edit', compact('mutasiLokasi', 'lokasi', 'pengadaan'));
    }

    // Memperbarui data mutasi lokasi
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'id_lokasi' => 'required|exists:tbl_lokasi,id_lokasi',
            'id_pengadaan' => 'required|exists:tbl_pengadaan,id_pengadaan',
            'flag_lokasi' => 'required|max:45',
            'flag_pindah' => 'required|max:45',
        ]);

        // Mencari mutasi lokasi berdasarkan id dan memperbarui datanya
        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $mutasiLokasi->update([
            'id_lokasi' => $request->id_lokasi,
            'id_pengadaan' => $request->id_pengadaan,
            'flag_lokasi' => $request->flag_lokasi,
            'flag_pindah' => $request->flag_pindah,
        ]);

        return redirect()->route('mutasi_lokasi.index')->with('success', 'Mutasi lokasi berhasil diperbarui.');
    }

    // Menghapus data mutasi lokasi
    public function destroy($id)
    {
        $mutasiLokasi = MutasiLokasi::findOrFail($id);
        $mutasiLokasi->delete();

        return redirect()->route('mutasi_lokasi.index')->with('success', 'Mutasi lokasi berhasil dihapus.');
    }
}
