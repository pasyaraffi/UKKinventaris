@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Data Perhitungan Depresiasi</h2>

    <!-- Menampilkan pesan sukses jika ada -->
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tabel Depresiasi -->
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
                </tr>
            </thead>
            <tbody>
                @foreach($data as $item)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $item->pengadaan->kode_pengadaan }}</td>
                    <td>{{ $item->tgl_hitung_depresiasi }}</td>
                    <td>{{ $item->bulan }}</td>
                    <td>{{ $item->durasi }} bulan</td>
                    <td>Rp {{ number_format($item->nilai_barang, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($item->hitungNilaiPenyusutan(), 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
