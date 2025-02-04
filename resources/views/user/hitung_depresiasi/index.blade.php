@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Hitung Depresiasi</h1>
    <a href="{{ route('hitung_depresiasi.create') }}" class="btn btn-primary mb-3">Tambah Data</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Pengadaan</th>
                <th>Tanggal Hitung</th>
                <th>Bulan</th>
                <th>Durasi</th>
                <th>Nilai Barang</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($depresiasi as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $item->tgl_hitung_depresiasi }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->durasi }}</td>
                    <td>{{ $item->nilai_barang }}</td>
                    <td>
                        <a href="{{ route('hitung_depresiasi.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('hitung_depresiasi.destroy', $item->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data tidak tersedia</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
