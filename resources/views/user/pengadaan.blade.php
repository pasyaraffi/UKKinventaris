@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Pengadaan</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pengadaan</th>
                            <th>Master Barang</th>
                            <th>Depresiasi</th>
                            <th>Merk</th>
                            <th>Satuan</th>
                            <th>Sub Kategori Asset</th>
                            <th>Distributor</th>
                            <th>No Invoice</th>
                            <th>No Seri Barang</th>
                            <th>Tahun Produksi</th>
                            <th>Tanggal Pengadaan</th>
                            <th>Harga Barang</th>
                            <th>Nilai Barang</th>
                            <th>FB</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $pengadaan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pengadaan->kode_pengadaan }}</td>
                                <td>{{ $pengadaan->masterBarang->nama_barang ?? '-' }}</td>
                                <td>{{ $pengadaan->depresiasi->lama_depresiasi ?? '-' }} bulan</td>
                                <td>{{ $pengadaan->merk->merk ?? '-' }}</td>
                                <td>{{ $pengadaan->satuan->satuan ?? '-' }}</td>
                                <td>{{ $pengadaan->subKategoriAsset->sub_kategori_asset ?? '-' }}</td>
                                <td>{{ $pengadaan->distributor->nama_distributor ?? '-' }}</td>
                                <td>{{ $pengadaan->no_invoice }}</td>
                                <td>{{ $pengadaan->no_seri_barang }}</td>
                                <td>{{ $pengadaan->tahun_produksi }}</td>
                                <td>{{ $pengadaan->tgl_pengadaan }}</td>
                                <td>Rp {{ number_format($pengadaan->harga_barang, 0, ',', '.') }}</td>
                                <td>Rp {{ number_format($pengadaan->nilai_barang, 0, ',', '.') }}</td>
                                <td>{{ $pengadaan->fb }}</td>
                                <td>{{ $pengadaan->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
