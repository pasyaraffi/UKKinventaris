@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Data Perhitungan Depresiasi</h1>
        <a href="{{ route('hitung_depresiasi.create') }}" class="btn btn-success shadow">
            <i class="fas fa-plus"></i> Tambah Data
        </a>
    </div>

    @if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

    <div class="card shadow-lg border-0 rounded-lg">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>No</th>
                            <th>Pengadaan</th>
                            <th>Tanggal Hitung</th>
                            <th>Bulan</th>
                            <th>Durasi</th>
                            <th>Nilai Barang</th>
                            <th>Nilai Penyusutan</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($depresiasi as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><span class="badge bg-primary">{{ $item->pengadaan->kode_pengadaan }}</span></td>
                            <td>{{ $item->tgl_hitung_depresiasi }}</td>
                            <td>{{ $item->bulan }}</td>
                            <td>{{ $item->durasi }} bulan</td>
                            <td class="fw-bold text-success">Rp {{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                            <td class="fw-bold text-danger">Rp {{ number_format($item->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                            <td class="text-center">
                                <a href="{{ route('hitung_depresiasi.show', $item->id_hitung_depresiasi) }}" class="btn btn-info btn-sm mx-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('hitung_depresiasi.edit', $item->id_hitung_depresiasi) }}" class="btn btn-warning btn-sm mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('hitung_depresiasi.destroy', $item->id_hitung_depresiasi) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm mx-1" onclick="return confirm('Yakin ingin menghapus?')">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center text-muted">Data tidak tersedia</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
