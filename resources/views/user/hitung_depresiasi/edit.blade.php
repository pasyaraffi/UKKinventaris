@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Hitung Depresiasi</h1>
    <form action="{{ route('hitung_depresiasi.store') }}" method="POST">
        @csrf
        <!-- Pilih Pengadaan -->
        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                <option value="" disabled selected>Pilih Pengadaan</option>
                @foreach ($pengadaan as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_pengadaan }} - {{ $item->no_invoice }}</option>
                @endforeach
            </select>
        </div>

        <!-- Tanggal Hitung Depresiasi -->
        <div class="mb-3">
            <label for="tgl_hitung_depresiasi" class="form-label">Tanggal Hitung Depresiasi</label>
            <input type="date" name="tgl_hitung_depresiasi" id="tgl_hitung_depresiasi" class="form-control" required>
        </div>

        <!-- Bulan -->
        <div class="mb-3">
            <label for="bulan" class="form-label">Bulan</label>
            <input type="text" name="bulan" id="bulan" class="form-control" placeholder="Contoh: Januari" required>
        </div>

        <!-- Durasi -->
        <div class="mb-3">
            <label for="durasi" class="form-label">Durasi</label>
            <input type="number" name="durasi" id="durasi" class="form-control" placeholder="Masukkan durasi (bulan)" required>
        </div>

        <!-- Nilai Barang -->
        <div class="mb-3">
            <label for="nilai_barang" class="form-label">Nilai Barang</label>
            <input type="number" name="nilai_barang" id="nilai_barang" class="form-control" placeholder="Masukkan nilai barang" required>
        </div>

        <!-- Tombol Submit -->
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('hitung_depresiasi.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
