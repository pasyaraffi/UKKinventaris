<?php

namespace App\Http\Controllers;

use App\Models\Depresiasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepresiasiController extends Controller
{
    // Menampilkan semua data Depresiasi
    public function index()
    {
        // Mengambil semua data depresiasi
        $data = Depresiasi::all();

        // Mengembalikan view dengan data
        return view('admin.depresiasi.index', compact('data'));
    }

    // Menampilkan form untuk menambahkan Depresiasi
    public function create()
    {
        $depresiasi = Depresiasi::all();
        return view('admin.depresiasi.create');
    }

    // Menyimpan data Depresiasi baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'lama_depresiasi' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:50',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('depresiasi.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Membuat data depresiasi baru
        $depresiasi = Depresiasi::create([
            'lama_depresiasi' => $request->lama_depresiasi,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil disimpan.');
    }

    // Menampilkan detail Depresiasi
    public function show($id)
    {
        // Mencari depresiasi berdasarkan ID
        $depresiasi = Depresiasi::find($id);

        if (!$depresiasi) {
            return redirect()->route('depresiasi.index')->with('error', 'Depresiasi tidak ditemukan.');
        }

        // Mengembalikan data ke view show
        return view('admin.depresiasi.show', compact('depresiasi'));
    }

    // Menampilkan form untuk mengedit Depresiasi
    public function edit($id)
    {
        // Mencari depresiasi berdasarkan ID
        $depresiasi = Depresiasi::find($id);

        if (!$depresiasi) {
            return redirect()->route('depresiasi.index')->with('error', 'Depresiasi tidak ditemukan.');
        }

        // Mengembalikan view dengan data depresiasi yang ditemukan
        return view('admin.depresiasi.edit', compact('depresiasi'));
    }

    // Mengupdate data Depresiasi
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'lama_depresiasi' => 'required|integer|min:1',
            'keterangan' => 'required|string|max:50',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('depresiasi.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Mencari depresiasi berdasarkan ID
        $depresiasi = Depresiasi::find($id);

        if (!$depresiasi) {
            return redirect()->route('depresiasi.index')->with('error', 'Depresiasi tidak ditemukan.');
        }

        // Update data depresiasi
        $depresiasi->update([
            'lama_depresiasi' => $request->lama_depresiasi,
            'keterangan' => $request->keterangan,
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil diupdate.');
    }

    // Menghapus data Depresiasi
    public function destroy($id)
    {
        try {
            // Mencari depresiasi berdasarkan ID
            $depresiasi = Depresiasi::find($id);
           // Menghapus data depresiasi
           $depresiasi->delete();
           // Redirect dengan pesan sukses
           return redirect()->route('depresiasi.index')->with('success', 'Depresiasi berhasil dihapus.');
        }catch (\Exception $e) {
            return redirect()->route('depresiasi.index')->with('error', 'Depresiasi tidak dapat di hapus karena sedang berelasi ke tabel lain!');
        }
        
    }
}
