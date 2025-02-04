@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Edit Lokasi</h1>

        <form action="{{ route('lokasi.update', $lokasi->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_lokasi" class="form-label">Kode Lokasi</label>
                <input type="text" class="form-control" id="kode_lokasi" name="kode_lokasi" value="{{ $lokasi->kode_lokasi }}" required>
            </div>
            <div class="mb-3">
                <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                <input type="text" class="form-control" id="nama_lokasi" name="nama_lokasi" value="{{ $lokasi->nama_lokasi }}" required>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $lokasi->keterangan }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
