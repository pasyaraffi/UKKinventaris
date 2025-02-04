@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Tambah Barang</h1>

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
            <label for="kode_barang" class="form-label">Kode Barang</label>
            <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="{{ old('kode_barang') }}" required>
        </div>

        <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Barang</label>
            <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="{{ old('nama_barang') }}" required>
        </div>

        <div class="mb-3">
            <label for="spesifikasi_teknis" class="form-label">Spesifikasi Teknis</label>
            <input type="text" name="spesifikasi_teknis" id="spesifikasi_teknis" class="form-control" value="{{ old('spesifikasi_teknis') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
