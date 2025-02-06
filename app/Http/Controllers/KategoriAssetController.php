<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriAsset;
use Illuminate\Support\Facades\Validator;

class KategoriAssetController extends Controller
{
    // Menampilkan semua data Kategori Asset
    public function index()
    {
        $data = KategoriAsset::all();
        return view('admin.kategori_asset.index', compact('data'));
    }

    // Menampilkan form untuk membuat Kategori Asset baru
    public function create()
    {
        return view('admin.kategori_asset.create');
    }

    // Menyimpan data Kategori Asset baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'kode_kategori_asset' => 'required|string|max:20',
            'kategori_asset' => 'required|string|max:25',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('kategori_asset.create')
                             ->withErrors($validator)
                             ->withInput();
        }

        // Membuat data kategori asset baru
        KategoriAsset::create([
            'kode_kategori_asset' => $request->kode_kategori_asset,
            'kategori_asset' => $request->kategori_asset,
        ]);

        return redirect()->route('kategori_asset.index')->with('success', 'Kategori Asset berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit Kategori Asset
    public function edit($id)
    {
        $kategoriAsset = KategoriAsset::findOrFail($id);
        return view('admin.kategori_asset.edit', compact('kategoriAsset'));
    }

    // Memperbarui data Kategori Asset
    public function update(Request $request, $id)
    {
        $kategoriAsset = KategoriAsset::findOrFail($id);

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'kode_kategori_asset' => 'required|string|max:20',
            'kategori_asset' => 'required|string|max:25',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('kategori_asset.edit', $id)
                             ->withErrors($validator)
                             ->withInput();
        }

        // Memperbarui data kategori asset
        $kategoriAsset->update([
            'kode_kategori_asset' => $request->kode_kategori_asset,
            'kategori_asset' => $request->kategori_asset,
        ]);

        return redirect()->route('kategori_asset.index')->with('success', 'Kategori Asset berhasil diperbarui!');
    }

    // Menghapus Kategori Asset
    public function destroy($id)
    {
        try {
            $kategoriAsset = KategoriAsset::findOrFail($id);
            $kategoriAsset->delete();

            return redirect()->route('kategori_asset.index')->with('success', 'Kategori Asset berhasil dihapus!');
        } catch (\Exception $e) {
        return redirect()->route('kategori_asset.index')->with('error', 'Kategori Asset tidak dapat di hapus karena sedang berelasi ke tabel lain!');
        }
    }
}
