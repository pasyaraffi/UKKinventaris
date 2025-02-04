<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KategoriAssetController;
use App\Http\Controllers\SubKategoriAssetController;
use App\Http\Controllers\MerkController;
use App\Http\Controllers\SatuanController;
use App\Http\Controllers\DepresiasiController;
use App\Http\Controllers\MasterBarangController;
use App\Http\Controllers\DistributorController;
use App\Http\Controllers\PengadaanController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MutasiLokasiController;
use App\Http\Controllers\OpnameController;
use App\Http\Controllers\HitungDepresiasiController;
use App\Http\Controllers\UserViewController;

// Home Route
Route::get('/', function () {
    return view('welcome');
});

// Dashboard Route (untuk pengguna terautentikasi)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Profile Routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit'); // GET: Show Profile Edit Form
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); // POST: Update Profile
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy'); // DELETE: Delete Profile
    Route::get('/show', [ProfileController::class, 'show'])->name('profile.show');
});

// Admin Routes (hanya untuk admin)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard'); // GET: Admin Dashboard

    // Kategori Asset Routes
    Route::get('/admin/kategori_asset', [KategoriAssetController::class, 'index'])->name('kategori_asset.index'); // GET: List Kategori Asset
    Route::get('/admin/kategori_asset/create', [KategoriAssetController::class, 'create'])->name('kategori_asset.create'); // GET: Show Create Form
    Route::post('/admin/kategori_asset', [KategoriAssetController::class, 'store'])->name('kategori_asset.store'); // POST: Store New Kategori Asset
    Route::get('/admin/kategori_asset/{id}/edit', [KategoriAssetController::class, 'edit'])->name('kategori_asset.edit'); // GET: Show Edit Form
    Route::put('/admin/kategori_asset/{id}', [KategoriAssetController::class, 'update'])->name('kategori_asset.update'); // PUT: Update Kategori Asset
    Route::delete('/admin/kategori_asset/{id}', [KategoriAssetController::class, 'destroy'])->name('kategori_asset.destroy'); // DELETE: Delete Kategori Asset

    // Sub Kategori Asset Routes
    Route::get('/admin/sub_kategori_asset', [SubKategoriAssetController::class, 'index'])->name('sub_kategori_asset.index');
    Route::get('/admin/sub_kategori_asset/create', [SubKategoriAssetController::class, 'create'])->name('sub_kategori_asset.create');
    Route::post('/admin/sub_kategori_asset', [SubKategoriAssetController::class, 'store'])->name('sub_kategori_asset.store');
    Route::get('/admin/sub_kategori_asset/{id}/edit', [SubKategoriAssetController::class, 'edit'])->name('sub_kategori_asset.edit');
    Route::put('/admin/sub_kategori_asset/{id}', [SubKategoriAssetController::class, 'update'])->name('sub_kategori_asset.update');
    Route::delete('/admin/sub_kategori_asset/{id}', [SubKategoriAssetController::class, 'destroy'])->name('sub_kategori_asset.destroy');

    // Merk Routes
    Route::get('/admin/merk', [MerkController::class, 'index'])->name('merk.index');
    Route::get('/admin/merk/create', [MerkController::class, 'create'])->name('merk.create');
    Route::post('/admin/merk', [MerkController::class, 'store'])->name('merk.store');
    Route::get('/admin/merk/{id}/edit', [MerkController::class, 'edit'])->name('merk.edit');
    Route::put('/admin/merk/{id}', [MerkController::class, 'update'])->name('merk.update');
    Route::delete('/admin/merk/{id}', [MerkController::class, 'destroy'])->name('merk.destroy');

    // Satuan Routes
    Route::get('/admin/satuan', [SatuanController::class, 'index'])->name('satuan.index');
    Route::get('/admin/satuan/create', [SatuanController::class, 'create'])->name('satuan.create');
    Route::post('/admin/satuan', [SatuanController::class, 'store'])->name('satuan.store');
    Route::get('/admin/satuan/{id}/edit', [SatuanController::class, 'edit'])->name('satuan.edit');
    Route::put('/admin/satuan/{id}', [SatuanController::class, 'update'])->name('satuan.update');
    Route::delete('/admin/satuan/{id}', [SatuanController::class, 'destroy'])->name('satuan.destroy');

    // Depresiasi Routes
    Route::get('/admin/depresiasi', [DepresiasiController::class, 'index'])->name('depresiasi.index');
    Route::get('/admin/depresiasi/create', [DepresiasiController::class, 'create'])->name('depresiasi.create');
    Route::post('/admin/depresiasi', [DepresiasiController::class, 'store'])->name('depresiasi.store');
    Route::get('/admin/depresiasi/{id}/edit', [DepresiasiController::class, 'edit'])->name('depresiasi.edit');
    Route::put('/admin/depresiasi/{id}', [DepresiasiController::class, 'update'])->name('depresiasi.update');
    Route::delete('/admin/depresiasi/{id}', [DepresiasiController::class, 'destroy'])->name('depresiasi.destroy');

    // Master Barang Routes
    Route::get('/admin/master_barang', [MasterBarangController::class, 'index'])->name('master_barang.index');
    Route::get('/admin/master_barang/create', [MasterBarangController::class, 'create'])->name('master_barang.create');
    Route::post('/admin/master_barang', [MasterBarangController::class, 'store'])->name('master_barang.store');
    Route::get('/admin/master_barang/{id_barang}/edit', [MasterBarangController::class, 'edit'])->name('master_barang.edit');
    Route::put('/admin/master_barang/{id_barang}', [MasterBarangController::class, 'update'])->name('master_barang.update');
    Route::delete('/admin/master_barang/{id_barang}', [MasterBarangController::class, 'destroy'])->name('master_barang.destroy');

    // Distributor Routes
    Route::get('/admin/distributor', [DistributorController::class, 'index'])->name('distributor.index');
    Route::get('/admin/distributor/create', [DistributorController::class, 'create'])->name('distributor.create');
    Route::post('/admin/distributor', [DistributorController::class, 'store'])->name('distributor.store');
    Route::get('/admin/distributor/{id}/edit', [DistributorController::class, 'edit'])->name('distributor.edit');
    Route::put('/admin/distributor/{id}', [DistributorController::class, 'update'])->name('distributor.update');
    Route::delete('/admin/distributor/{id}', [DistributorController::class, 'destroy'])->name('distributor.destroy');

    // Pengadaan Routes
    Route::get('/admin/pengadaan', [PengadaanController::class, 'index'])->name('pengadaan.index');
    Route::get('/admin/pengadaan/create', [PengadaanController::class, 'create'])->name('pengadaan.create');
    Route::post('/admin/pengadaan', [PengadaanController::class, 'store'])->name('pengadaan.store');
    Route::get('/admin/pengadaan/{id}/edit', [PengadaanController::class, 'edit'])->name('pengadaan.edit');
    Route::put('/admin/pengadaan/{id}', [PengadaanController::class, 'update'])->name('pengadaan.update');
    Route::delete('/admin/pengadaan/{id}', [PengadaanController::class, 'destroy'])->name('pengadaan.destroy');
    Route::get('/pengadaan/{id}/depresiasi', [PengadaanController::class, 'showDepresiasi'])->name('pengadaan.depresiasi');

    // Lokasi Routes
    Route::get('/admin/lokasi', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('/admin/lokasi/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('/admin/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('/admin/lokasi/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::put('/admin/lokasi/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
    Route::delete('/admin/lokasi/{id}', [LokasiController::class, 'destroy'])->name('lokasi.destroy');

    // Mutasi Lokasi Routes
    Route::get('/admin/mutasi_lokasi', [MutasiLokasiController::class, 'index'])->name('mutasi_lokasi.index');
    Route::get('/admin/mutasi_lokasi/create', [MutasiLokasiController::class, 'create'])->name('mutasi_lokasi.create');
    Route::post('/admin/mutasi_lokasi', [MutasiLokasiController::class, 'store'])->name('mutasi_lokasi.store');
    Route::get('/admin/mutasi_lokasi/{id}/edit', [MutasiLokasiController::class, 'edit'])->name('mutasi_lokasi.edit');
    Route::put('/admin/mutasi_lokasi/{id}', [MutasiLokasiController::class, 'update'])->name('mutasi_lokasi.update');
    Route::delete('/admin/mutasi_lokasi/{id}', [MutasiLokasiController::class, 'destroy'])->name('mutasi_lokasi.destroy');

    // Opname Routes
    Route::get('/admin/opname', [OpnameController::class, 'index'])->name('opname.index');
    Route::get('/admin/opname/create', [OpnameController::class, 'create'])->name('opname.create');
    Route::post('/admin/opname', [OpnameController::class, 'store'])->name('opname.store');
    Route::get('/admin/opname/{id}/edit', [OpnameController::class, 'edit'])->name('opname.edit');
    Route::put('/admin/opname/{id}', [OpnameController::class, 'update'])->name('opname.update');
    Route::delete('/admin/opname/{id}', [OpnameController::class, 'destroy'])->name('opname.destroy');

    // Hitung Depresiasi Routes
    Route::get('/admin/hitung_depresiasi', [HitungDepresiasiController::class, 'index'])->name('hitung_depresiasi.index');
    Route::get('/admin/hitung_depresiasi/create', [HitungDepresiasiController::class, 'create'])->name('hitung_depresiasi.create');
    Route::post('/admin/hitung_depresiasi', [HitungDepresiasiController::class, 'store'])->name('hitung_depresiasi.store');
    Route::get('/admin/hitung_depresiasi/{id}', [HitungDepresiasiController::class, 'show'])->name('hitung_depresiasi.show');
    Route::get('/admin/hitung_depresiasi/{id}/edit', [HitungDepresiasiController::class, 'edit'])->name('hitung_depresiasi.edit');
    Route::put('/admin/hitung_depresiasi/{id}', [HitungDepresiasiController::class, 'update'])->name('hitung_depresiasi.update');
    Route::delete('/admin/hitung_depresiasi/{id}', [HitungDepresiasiController::class, 'destroy'])->name('hitung_depresiasi.destroy');
});


// User Routes
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/show', [UserController::class, 'show'])->name('user.show');
});

// Routes untuk user view
Route::prefix('user')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', [UserViewController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/kategori-asset', [UserViewController::class, 'kategoriAsset'])->name('user.kategori_asset');
    Route::get('/sub-kategori-asset', [UserViewController::class, 'subKategoriAsset'])->name('user.sub_kategori_asset');
    Route::get('/merk', [UserViewController::class, 'merk'])->name('user.merk');
    Route::get('/satuan', [UserViewController::class, 'satuan'])->name('user.satuan');
    Route::get('/depresiasi', [UserViewController::class, 'depresiasi'])->name('user.depresiasi');
    Route::get('/master-barang', [UserViewController::class, 'masterBarang'])->name('user.master_barang');
    Route::get('/distributor', [UserViewController::class, 'distributor'])->name('user.distributor');
    Route::get('/pengadaan', [UserViewController::class, 'pengadaan'])->name('user.pengadaan');
    Route::get('/lokasi', [UserViewController::class, 'lokasi'])->name('user.lokasi');
    Route::get('/mutasi-lokasi', [UserViewController::class, 'mutasiLokasi'])->name('user.mutasi_lokasi');
    Route::get('/opname', [UserViewController::class, 'opname'])->name('user.opname');
    Route::get('/hitung-depresiasi', [UserViewController::class, 'hitungDepresiasi'])->name('user.hitung_depresiasi');
});

// Logout Route
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout');

// Authentication Routes
require __DIR__.'/auth.php';
