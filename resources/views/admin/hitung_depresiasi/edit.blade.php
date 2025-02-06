@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Edit Data Perhitungan Depresiasi</h1>
    </div>

    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body p-4">
            <form action="{{ route('hitung_depresiasi.update', $depresiasi->id_hitung_depresiasi) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="id_pengadaan" class="form-label fw-bold">Pengadaan</label>
                    <select name="id_pengadaan" id="id_pengadaan" class="form-select" required>
                        <option value="" disabled>Pilih Pengadaan</option>
                        @foreach ($pengadaan as $item)
                        <option value="{{ $item->id_pengadaan }}" {{ $depresiasi->id_pengadaan == $item->id_pengadaan ?
                            'selected' : '' }}>
                            {{ $item->kode_pengadaan }} - {{ $item->no_invoice }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tgl_hitung_depresiasi" class="form-label fw-bold">Tanggal Hitung Depresiasi</label>
                    <input type="date" name="tgl_hitung_depresiasi" id="tgl_hitung_depresiasi" class="form-control"
                        value="{{ $depresiasi->tgl_hitung_depresiasi }}" required>
                </div>

                <div class="mb-3">
                    <label for="bulan" class="form-label fw-bold">Bulan</label>
                    <input type="text" name="bulan" id="bulan" class="form-control" value="{{ $depresiasi->bulan }}"
                        required>
                </div>

                <div class="mb-3">
                    <label for="durasi" class="form-label fw-bold">Durasi (bulan)</label>
                    <input type="number" name="durasi" id="durasi" class="form-control"
                        value="{{ $depresiasi->durasi }}" required>
                </div>

                <div class="mb-3">
                    <label for="nilai_barang" class="form-label fw-bold">Nilai Barang</label>
                    <input type="number" name="nilai_barang" id="nilai_barang" class="form-control"
                        value="{{ $depresiasi->nilai_barang }}" required>
                </div>

                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary shadow-sm">
                        <i class="fas fa-save"></i> Update
                    </button>
                    <a href="{{ route('hitung_depresiasi.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
