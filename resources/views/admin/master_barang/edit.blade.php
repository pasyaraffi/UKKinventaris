@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0"><i class="fas fa-plus"></i> Tambah Barang</h3>
        </div>
        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('master_barang.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="kode_barang" class="form-label fw-bold">Kode Barang</label>
                    <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
                </div>

                <div class="mb-3">
                    <label for="nama_barang" class="form-label fw-bold">Nama Barang</label>
                    <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" required>
                </div>

                <div class="mb-3">
                    <label for="spesifikasi_teknis" class="form-label fw-bold">Spesifikasi Teknis</label>
                    <input type="text" name="spesifikasi_teknis" id="spesifikasi_teknis" class="form-control" value="{{ old('spesifikasi_teknis') }}">
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('master_barang.index') }}" class="btn btn-secondary me-2"><i class="fas fa-arrow-left"></i> Batal</a>
                    <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection