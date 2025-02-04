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
    <a href="{{ route('pengadaan.create') }}" class="btn btn-primary mb-3">Tambah Pengadaan</a>

    <!-- Tabel Pengadaan -->
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
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $pengadaan)
            <tr>
            <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->kode_pengadaan }}</td>
                    <td>{{ $item->masterBarang->nama_barang }}</td>
                    <td>{{ $item->depresiasi->keterangan }}</td>
                    <td>{{ $item->merk->merk }}</td>
                    <td>{{ $item->satuan->satuan }}</td>
                    <td>{{ $item->subKategoriAsset->sub_kategori_asset }}</td>
                    <td>{{ $item->distributor->nama_distributor }}</td>
                    <td>
                        <a href="{{ route('pengadaan.edit', $item->id_pengadaan) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('pengadaan.destroy', $item->id_pengadaan) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
