<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Merk;
use Illuminate\Support\Facades\Validator;

class MerkController extends Controller
{
    // Menampilkan semua data Merk
    public function index()
    {
        $data = Merk::all();
        return view('admin.merk.index', compact('data'));
    }

    // Menampilkan form untuk membuat Merk baru
    public function create()
    {
        return view('admin.merk.create');
    }

    // Menyimpan data Merk baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('merk.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Membuat data merk baru
        Merk::create([
            'merk' => $request->merk,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('merk.index')->with('success', 'Merk berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit Merk
    public function edit($id)
    {
        $merk = Merk::findOrFail($id);
        return view('admin.merk.edit', compact('merk'));
    }

    // Memperbarui data Merk
    public function update(Request $request, $id)
    {
        $merk = Merk::findOrFail($id);

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'merk' => 'required|string|max:50',
            'keterangan' => 'nullable|string|max:50',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('merk.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Memperbarui data merk
        $merk->update([
            'merk' => $request->merk,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('merk.index')->with('success', 'Merk berhasil diperbarui!');
    }

    // Menghapus Merk
    public function destroy($id)
    {
        try {
            $merk = Merk::findOrFail($id);
        $merk->delete();
        return redirect()->route('merk.index')->with('success', 'Merk berhasil dihapus!');
        }catch (\Exception $e) {
            return redirect()->route('merk.index')->with('error', 'Merk tidak dapat di hapus karena sedang berelasi ke tabel lain!');
        }
        
    }
}
