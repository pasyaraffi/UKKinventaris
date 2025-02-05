@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Daftar Pengadaan</h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tombol untuk menambah pengadaan -->
    <a href="{{ route('pengadaan.create') }}" class="mb-3 btn btn-primary">Tambah Pengadaan</a>

    <!-- Tabel Pengadaan -->
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
                    <th>Nilai Penyusutan/Bulan</th>
                    <th>FB</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $pengadaan)
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
                    <td>Rp {{ number_format($pengadaan->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                    <td>{{ $pengadaan->fb }}</td>
                    <td>{{ $pengadaan->keterangan }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <a href="{{ route('pengadaan.edit', $pengadaan->id_pengadaan) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            <a href="{{ route('pengadaan.depresiasi', $pengadaan->id_pengadaan) }}"
                                class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('pengadaan.destroy', $pengadaan->id_pengadaan) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm"
                                    onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
