@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Simulasi Penyusutan Asset</h3>
                </div>
                <div class="card-body">
                    <!-- Informasi Asset -->
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <table class="table table-bordered">
                                <tr>
                                    <th width="40%">Kode Pengadaan</th>
                                    <td>{{ $pengadaan->kode_pengadaan }}</td>
                                </tr>
                                <tr>
                                    <th>Nama Barang</th>
                                    <td>{{ $pengadaan->masterBarang->nama_barang }}</td>
                                </tr>
                                <tr>
                                    <th>Nilai Awal Asset</th>
                                    <td>Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Nilai Penyusutan/Bulan</th>
                                    <td>Rp {{ number_format($pengadaan->hitungDepresiasi(), 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <th>Lama Penyusutan</th>
                                    <td>{{ $pengadaan->depresiasi->lama_depresiasi }} Bulan</td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- Tabel Penyusutan -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Bulan Ke-</th>
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
                        <a href="{{ route('pengadaan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
