<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Satuan;
use Illuminate\Support\Facades\Validator;

class SatuanController extends Controller
{
    // Menampilkan semua data Satuan
    public function index()
    {
        $data = Satuan::all();
        return view('admin.satuan.index', compact('data'));
    }

    // Menampilkan form untuk membuat Satuan baru
    public function create()
    {
        return view('admin.satuan.create');
    }

    // Menyimpan data Satuan baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'satuan' => 'required|string|max:20',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('satuan.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Membuat data satuan baru
        Satuan::create([
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit Satuan
    public function edit($id)
    {
        $satuan = Satuan::findOrFail($id);
        return view('admin.satuan.edit', compact('satuan'));
    }

    // Memperbarui data Satuan
    public function update(Request $request, $id)
    {
        $satuan = Satuan::findOrFail($id);

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'satuan' => 'required|string|max:20',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('satuan.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Memperbarui data satuan
        $satuan->update([
            'satuan' => $request->satuan,
        ]);

        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil diperbarui!');
    }

    // Menghapus Satuan
    public function destroy($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();
        return redirect()->route('satuan.index')->with('success', 'Satuan berhasil dihapus!');
    }
}
