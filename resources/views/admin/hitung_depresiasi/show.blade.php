@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Detail Perhitungan Depresiasi</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Kode Pengadaan</th>
                        <td>{{ $depresiasi->pengadaan->kode_pengadaan }}</td>
                    </tr>
                    <tr>
                        <th>Nama Barang</th>
                        <td>{{ $depresiasi->pengadaan->masterBarang->nama_barang }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Awal Asset</th>
                        <td>Rp {{ number_format($depresiasi->nilai_barang, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Penyusutan per Bulan</th>
                        <td>Rp {{ number_format($depresiasi->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Lama Penyusutan</th>
                        <td>{{ $depresiasi->durasi }} Bulan</td>
                    </tr>
                </table>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Bulan ke:</th>
                            <th>Nilai Penyusutan</th>
                            <th>Nilai Sisa Asset</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detailPenyusutan as $detail)
                        <tr>
                            <td>{{ $detail['bulan'] }}</td>
                            <td>Rp {{ number_format($detail['nilai_penyusutan'], 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($detail['nilai_sisa'], 0, ',', '.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('hitung_depresiasi.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection
