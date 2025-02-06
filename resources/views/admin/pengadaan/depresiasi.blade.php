@extends('layouts.app')

@section('content')
<div class="container-fluid mt-4">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0">
                <div class="card-header bg-primary text-white text-center">
                    <h3 class="mb-0">Simulasi Penyusutan Asset</h3>
                </div>
                <div class="card-body">
                    <!-- Informasi Asset -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="p-3 bg-light rounded">
                                <table class="table table-hover">
                                    <tr>
                                        <th width="40%" class="text-primary">Kode Pengadaan</th>
                                        <td>{{ $pengadaan->kode_pengadaan }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary">Nama Barang</th>
                                        <td>{{ $pengadaan->masterBarang->nama_barang }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary">Nilai Awal Asset</th>
                                        <td class="fw-bold text-success">Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary">Nilai Penyusutan/Bulan</th>
                                        <td class="fw-bold text-danger">Rp {{ number_format($pengadaan->hitungDepresiasi(), 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-primary">Lama Penyusutan</th>
                                        <td>{{ $pengadaan->depresiasi->lama_depresiasi }} Bulan</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Penyusutan -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="bg-dark text-white text-center">
                                <tr>
                                    <th>Bulan Ke-</th>
                                    <th>Nilai Penyusutan</th>
                                    <th>Nilai Sisa Asset</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($detailPenyusutan as $detail)
                                <tr>
                                    <td class="fw-bold text-center">{{ $detail['bulan'] }}</td>
                                    <td class="text-danger text-end">Rp {{ number_format($detail['nilai_penyusutan'], 0, ',', '.') }}</td>
                                    <td class="text-success text-end">Rp {{ number_format($detail['nilai_sisa'], 0, ',', '.') }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4 text-center">
                        <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary btn-lg px-4">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection