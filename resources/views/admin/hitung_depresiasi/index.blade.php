@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Data Perhitungan Depresiasi</h1>
    <a href="{{ route('hitung_depresiasi.create') }}" class="mb-3 btn btn-primary">Tambah Data</a>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Pengadaan</th>
                            <th>Tanggal Hitung</th>
                            <th>Bulan</th>
                            <th>Durasi</th>
                            <th>Nilai Barang</th>
                            <th>Nilai Penyusutan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($depresiasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                            <td>{{ $item->tgl_hitung_depresiasi }}</td>
                            <td>{{ $item->bulan }}</td>
                            <td>{{ $item->durasi }} bulan</td>
                            <td>Rp {{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                            <td>Rp {{ number_format($item->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                            <td>
                                <a href="{{ route('hitung_depresiasi.show', $item->id_hitung_depresiasi) }}"
                                    class="btn btn-info btn-sm">Detail</a>
                                <a href="{{ route('hitung_depresiasi.edit', $item->id_hitung_depresiasi) }}"
                                    class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('hitung_depresiasi.destroy', $item->id_hitung_depresiasi) }}"
                                    method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="9" class="text-center">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
