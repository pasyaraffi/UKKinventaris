@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Hitung Depresiasi</h1>
    <form action="{{ route('hitung_depresiasi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control">
                @foreach ($pengadaan as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_pengadaan }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="tgl_hitung_depresiasi" class="form-label">Tanggal Hitung</label>
            <input type="date" name="tgl_hitung_depresiasi" id="tgl_hitung_depresiasi" class="form-control">
        </div>
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" name="bulan" id="bulan" class="form-control">
        </div>
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi</label>
            <input type="number" name="durasi" id="durasi" class="form-control">
        </div>
        <div class="mb-3">
            <label for="nilai_barang" class="form-label">Nilai Barang</label>
            <input type="number" name="nilai_barang" id="nilai_barang" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
