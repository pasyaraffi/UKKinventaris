@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card">
        <div class="card-header">
            <h4>Detail Depresiasi Barang</h4>
        </div>
        <div class="card-body">
            <div class="mb-4">
                <h5>Informasi Barang</h5>
                <table class="table">
                    <tr>
                        <th>Kode Pengadaan</th>
                        <td>: {{ $pengadaan->kode_pengadaan }}</td>
                    </tr>
                    <tr>
                        <th>Harga Awal</th>
                        <td>: Rp {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Nilai Depresiasi per Bulan</th>
                        <td>: Rp {{ number_format($pengadaan->depresiasi_barang, 0, ',', '.') }}</td>
                    </tr>
                    <tr>
                        <th>Durasi Penyusutan</th>
                        <td>: {{ $pengadaan->lama_depresiasi }} bulan</td>
                    </tr>
                </table>
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
                        @endphp

                        <tr>
                            <td>1</td>
                            <td>Rp {{ number_format($nilaiSisa, 0, ',', '.') }}</td>
                        </tr>

                        @for ($i = 2; $i <= $pengadaan->durasi; $i++)
                            @php
                            $nilaiSisa -= $nilaiPenyusutanPerBulan;
                            @endphp
                            <tr>
                                <td>{{ $i }}</td>
                                <td>Rp {{ number_format($nilaiSisa, 0, ',', '.') }}</td>
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
