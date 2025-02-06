<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // Menampilkan daftar lokasi
    public function index()
    {
        $lokasi = Lokasi::all(); // Mengambil semua data lokasi
        return view('admin.lokasi.index', compact('lokasi')); // Menampilkan data di view
    }

    // Menampilkan form untuk membuat lokasi baru
    public function create()
    {
        return view('admin.lokasi.create');
    }

    // Menyimpan data lokasi baru
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'kode_lokasi' => 'required|max:20',
            'nama_lokasi' => 'required|max:20',
            'keterangan' => 'nullable|max:50',
        ]);

        // Membuat lokasi baru
        Lokasi::create([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil ditambahkan.');
    }

    // Menampilkan form untuk mengedit lokasi
    public function edit($id_lokasi)
    {
        $lokasi = Lokasi::findOrFail($id_lokasi); // Mencari lokasi berdasarkan id
        return view('admin.lokasi.edit', compact('lokasi')); // Menampilkan data lokasi ke form edit
    }

    // Memperbarui data lokasi
    public function update(Request $request, $id_lokasi)
    {
        // Validasi input
        $request->validate([
            'kode_lokasi' => 'required|max:20',
            'nama_lokasi' => 'required|max:20',
            'keterangan' => 'nullable|max:50',
        ]);

        // Mencari lokasi berdasarkan id dan memperbarui datanya
        $lokasi = Lokasi::findOrFail($id_lokasi);
        $lokasi->update([
            'kode_lokasi' => $request->kode_lokasi,
            'nama_lokasi' => $request->nama_lokasi,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil diperbarui.');
    }

    // Menghapus data lokasi
    public function destroy($id_lokasi)
    {
        try {
            $lokasi = Lokasi::findOrFail($id_lokasi);
            $lokasi->delete();

            return redirect()->route('lokasi.index')->with('success', 'Lokasi berhasil dihapus.');
        }catch(\Exception $e) {
            return redirect()->route('lokasi.index')->with('error', 'Lokasi tidak dapat di hapus karena sedang berelasi ke tabel lain!');
        }
        
    }
}
