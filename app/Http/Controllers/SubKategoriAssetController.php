<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SubKategoriAsset;
use App\Models\KategoriAsset;
use Illuminate\Support\Facades\Validator;

class SubKategoriAssetController extends Controller
{
    // Menampilkan semua data Sub Kategori Asset
    public function index()
    {
        $data = SubKategoriAsset::all();
        return view('admin.sub_kategori_asset.index', compact('data'));
    }

    // Menampilkan form untuk membuat Sub Kategori Asset baru
    public function create()
    {
        $kategoriAssets = KategoriAsset::all(); // Ambil semua kategori asset
        return view('admin.sub_kategori_asset.create', compact('kategoriAssets'));
    }

    // Menyimpan data Sub Kategori Asset baru
    public function store(Request $request)
    {
        // Validasi data input
        $validator = Validator::make($request->all(), [
            'id_kategori_asset' => 'required|exists:tbl_kategori_asset,id_kategori_asset', // Ganti nama tabel sesuai dengan yang digunakan
            'kode_sub_kategori_asset' => 'required|string|max:20',
            'sub_kategori_asset' => 'required|string|max:25',
        ]);
    
        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect()->route('sub_kategori_asset.create')
                             ->withErrors($validator)
                             ->withInput();
        }
    
        // Membuat data sub kategori asset baru
        SubKategoriAsset::create([
            'id_kategori_asset' => $request->id_kategori_asset,
            'kode_sub_kategori_asset' => $request->kode_sub_kategori_asset,
            'sub_kategori_asset' => $request->sub_kategori_asset,
        ]);
    
        // Mengarahkan kembali ke halaman daftar dengan pesan sukses
        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil ditambahkan!');
    }
    

    // Menampilkan form untuk mengedit Sub Kategori Asset
    public function edit($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $kategoriAssets = KategoriAsset::all();
        return view('admin.sub_kategori_asset.edit', compact('subKategoriAsset', 'kategoriAssets'));
    }

    // Memperbarui data Sub Kategori Asset
    public function update(Request $request, $id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);

        // Validasi data input
        $validator = Validator::make($request->all(), [
            'id_kategori_asset' => 'required|exists:kategori_assets,id_kategori_asset',
            'kode_sub_kategori_asset' => 'required|string|max:20',
            'sub_kategori_asset' => 'required|string|max:25',
        ]);

        

        // Memperbarui data sub kategori asset
        $subKategoriAsset->update([
            'id_kategori_asset' => $request->id_kategori_asset,
            'kode_sub_kategori_asset' => $request->kode_sub_kategori_asset,
            'sub_kategori_asset' => $request->sub_kategori_asset,
        ]);

        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil diperbarui!');
    }

    // Menghapus Sub Kategori Asset
    public function destroy($id)
    {
        $subKategoriAsset = SubKategoriAsset::findOrFail($id);
        $subKategoriAsset->delete();
        return redirect()->route('sub_kategori_asset.index')->with('success', 'Sub Kategori Asset berhasil dihapus!');
    }
}
