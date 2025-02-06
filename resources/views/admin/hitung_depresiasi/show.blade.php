@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-primary text-white text-center">
            <h4 class="mb-0">Detail Perhitungan Depresiasi</h4>
        </div>
        <div class="card-body">
            <div class="mb-4 p-3 bg-light rounded">
                <table class="table table-hover">
                    <tr>
                        <th width="30%" class="text-primary">Kode Pengadaan</th>
                        <td>{{ $depresiasi->pengadaan->kode_pengadaan }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">Nama Barang</th>
                        <td>{{ $depresiasi->pengadaan->masterBarang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">Nilai Awal Asset</th>
                        <td class="fw-bold text-success">Rp {{ number_format($depresiasi->nilai_barang, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">Nilai Penyusutan per Bulan</th>
                        <td class="fw-bold text-danger">Rp {{ number_format($depresiasi->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th class="text-primary">Lama Penyusutan</th>
                        <td>{{ $depresiasi->durasi }} Bulan</td>
                    </tr>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="bg-dark text-white">
                        <tr>
                            <th>Bulan ke</th>
                            <th>Nilai Penyusutan</th>
                            <th>Nilai Sisa Asset</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailPenyusutan as $detail)
                        <tr>
                            <td class="fw-bold">{{ $detail['bulan'] }}</td>
                            <td class="text-danger">Rp {{ number_format($detail['nilai_penyusutan'], 0, ',', '.') }}</td>
                            <td class="text-success">Rp {{ number_format($detail['nilai_sisa'], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-4 text-center">
                <a href="{{ route('hitung_depresiasi.index') }}" class="btn btn-secondary btn-lg px-4">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection