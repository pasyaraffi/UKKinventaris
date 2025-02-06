@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4">
        <h1 class="text-center text-primary">Tambah Barang</h1>
        <hr>

        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <form action="{{ route('master_barang.store') }}" method="POST" class="mt-3">
            @csrf

            <div class="mb-3">
                <label for="kode_barang" class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
            </div>

            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" required>
            </div>

            <div class="mb-3">
                <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
                <textarea name="spesifikasi_teknis" id="spesifikasi_teknis" class="form-control" rows="3">{{ old('spesifikasi_teknis') }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('master_barang.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
                <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
            </div>
        </form>
    </div>
</div>
@endsection
