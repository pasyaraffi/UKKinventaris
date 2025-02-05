@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h4>Detail Depresiasi Barang</h4>
        </div>
        <div class="card-body">
            <div class="mb-4 row">
                <div class="col-md-6">
                    <table class="table">
                        <tr>
                            <th>Kode Pengadaan</th>
                            <td>: {{ $pengadaan->kode_pengadaan }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Barang</th>
                            <td>: Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Nilai Depresiasi per Bulan</th>
                            <td>: Rp {{ number_format($pengadaan->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Durasi Penyusutan</th>
                            <td>: {{ $pengadaan->depresiasi->lama_depresiasi}} bulan</td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Bulan ke-</th>
                            <th>Nilai Barang</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $nilaiPenyusutanPerBulan = $pengadaan->hitungNilaiPenyusutan();
                        $nilaiSisa = $pengadaan->nilai_barang;
                        $durasi = $pengadaan->depresiasi->lama_depresiasi; // Pastikan variabel durasi sesuai dengan input
                        @endphp

                        <tr>
                            <td>1</td>
                            <td>Rp {{ number_format($nilaiSisa, 0, ',', '.') }}</td>
                        </tr>

                        @for ($i = 2; $i <= $durasi; $i++)
                            @php
                            $nilaiSisa -= $nilaiPenyusutanPerBulan;
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Rp {{ number_format(max(0, $nilaiSisa), 0, ',', '.') }}</td>
                            </tr>
                        @endfor
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
</div>
@endsection