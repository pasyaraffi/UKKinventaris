@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="text-center mb-4">Admin Dashboard</h1>
        <p class="text-center">Kelola data dan aset dengan mudah melalui menu di bawah ini.</p>
        
        <!-- Menu Navigasi -->
        <div class="row mt-4">
            <!-- Kategori Aset -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Kategori Aset</h5>
                        <p class="card-text">Kelola kategori aset yang tersedia di sistem.</p>
                        <a href="{{ route('kategori_asset.index') }}" class="btn btn-primary">Kelola Kategori</a>
                    </div>
                </div>
            </div>

            <!-- Sub Kategori Aset -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Sub Kategori Aset</h5>
                        <p class="card-text">Kelola sub kategori aset detail yang lebih spesifik.</p>
                        <a href="{{ route('sub_kategori_asset.index') }}" class="btn btn-primary">Kelola Sub Kategori</a>
                    </div>
                </div>
            </div>

            <!-- Merk -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Merk</h5>
                        <p class="card-text">Kelola data merk barang.</p>
                        <a href="{{ route('merk.index') }}" class="btn btn-primary">Kelola Merk</a>
                    </div>
                </div>
            </div>

            <!-- Satuan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Satuan</h5>
                        <p class="card-text">Kelola data satuan barang.</p>
                        <a href="{{ route('satuan.index') }}" class="btn btn-primary">Kelola Satuan</a>
                    </div>
                </div>
            </div>

             <!-- Depresiasi -->
             <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Depresiasi</h5>
                        <p class="card-text">Lihat dan kelola data depresiasi aset.</p>
                        <a href="{{ route('depresiasi.index') }}" class="btn btn-primary">Kelola Depresiasi</a>
                    </div>
                </div>
            </div>

            <!-- Master Barang -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Master Barang</h5>
                        <p class="card-text">Kelola daftar barang yang tersedia.</p>
                        <a href="{{ route('master_barang.index') }}" class="btn btn-primary">Kelola Barang</a>
                    </div>
                </div>
            </div>

            <!-- Distributor -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Distributor</h5>
                        <p class="card-text">Kelola informasi distributor barang.</p>
                        <a href="{{ route('distributor.index') }}" class="btn btn-primary">Kelola Distributor</a>
                    </div>
                </div>
            </div>

                        <!-- Pengadaan -->
                        <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Pengadaan</h5>
                        <p class="card-text">Kelola data pengadaan barang di sistem.</p>
                        <a href="{{ route('pengadaan.index') }}" class="btn btn-primary">Kelola Pengadaan</a>
                    </div>
                </div>
            </div>

            <!-- Lokasi -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Lokasi</h5>
                        <p class="card-text">Kelola lokasi barang dan aset di sistem.</p>
                        <a href="{{ route('lokasi.index') }}" class="btn btn-primary">Kelola Lokasi</a>
                    </div>
                </div>
            </div>

            <!-- Mutasi Lokasi -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Mutasi Lokasi</h5>
                        <p class="card-text">Kelola mutasi lokasi barang dan aset.</p>
                        <a href="{{ route('mutasi_lokasi.index') }}" class="btn btn-primary">Kelola Mutasi</a>
                    </div>
                </div>
            </div>

            <!-- Opname -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Opname</h5>
                        <p class="card-text">Lihat dan kelola data opname barang.</p>
                        <a href="{{ route('opname.index') }}" class="btn btn-primary">Kelola Opname</a>
                    </div>
                </div>
            </div>

            <!-- Hitung Depresiasi -->
            <div class="col-md-4 mb-4">
                <div class="card shadow-sm">
                    <div class="card-body text-center">
                        <h5 class="card-title">Hitung Depresiasi</h5>
                        <p class="card-text">Lakukan perhitungan depresiasi untuk aset.</p>
                        <a href="{{ route('hitung_depresiasi.index') }}" class="btn btn-primary">Kelola Perhitungan</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
