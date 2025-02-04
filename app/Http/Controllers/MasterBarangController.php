<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterBarang;
use Illuminate\Support\Facades\Validator;

class MasterBarangController extends Controller
{
    public function index()
    {
        $data = MasterBarang::all();
        return view('admin.master_barang.index', compact('data'));
    }

    public function create()
    {
        return view('admin.master_barang.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|string|max:20|unique:tbl_master_barang',
            'nama_barang' => 'required|string|max:100',
            'spesifikasi_teknis' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->route('master_barang.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        MasterBarang::create([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'spesifikasi_teknis' => $request->spesifikasi_teknis,
        ]);

        return redirect()->route('master_barang.index')->with('success', 'Barang berhasil ditambahkan!');
    }

    public function edit($id_barang)
    {
        $masterBarang = MasterBarang::findOrFail($id_barang);
        return view('admin.master_barang.edit', compact('masterBarang'));
    }

    public function update(Request $request, $id_barang)
    {
        $masterBarang = MasterBarang::findOrFail($id_barang);

        $validator = Validator::make($request->all(), [
            'kode_barang' => 'required|string|max:20|unique:tbl_master_barang,kode_barang,' . $id_barang . ',id_barang',
            'nama_barang' => 'required|string|max:100',
            'spesifikasi_teknis' => 'nullable|string|max:100',
        ]);

        if ($validator->fails()) {
            return redirect()->route('master_barang.edit', $id_barang)
                             ->withErrors($validator)
                             ->withInput();
        }

        $masterBarang->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang,
            'spesifikasi_teknis' => $request->spesifikasi_teknis,
        ]);

        return redirect()->route('master_barang.index')->with('success', 'Barang berhasil diperbarui!');
    }

    public function destroy($id_barang)
    {
        $masterBarang = MasterBarang::findOrFail($id_barang);
        $masterBarang->delete();

        return redirect()->route('master_barang.index')->with('success', 'Barang berhasil dihapus!');
    }
}
