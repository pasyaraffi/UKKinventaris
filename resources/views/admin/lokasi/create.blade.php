@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="fw-bold">Tambah Lokasi</h1>
            <a href="{{ route('lokasi.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>

        <div class="card shadow-lg border-0">
            <div class="card-body">
                <form action="{{ route('lokasi.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="kode_lokasi" class="form-label">Kode Lokasi</label>
                        <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                        <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" required>
                    </div>
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary shadow-sm">
                            <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
