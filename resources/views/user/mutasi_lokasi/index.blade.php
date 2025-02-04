@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Mutasi Lokasi</h1>
        <a href="{{ route('mutasi_lokasi.create') }}" class="btn btn-primary mb-3">Tambah Mutasi Lokasi</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Lokasi</th>
                    <th>ID Pengadaan</th>
                    <th>Flag Lokasi</th>
                    <th>Flag Pindah</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($mutasiLokasi as $mutasi)
                    <tr>
                        <td>{{ $mutasi->id }}</td>
                        <td>{{ $mutasi->lokasi->nama_lokasi }}</td>
                        <td>{{ $mutasi->pengadaan->kode_pengadaan }}</td>
                        <td>{{ $mutasi->flag_lokasi }}</td>
                        <td>{{ $mutasi->flag_pindah }}</td>
                        <td>
                            <a href="{{ route('mutasi_lokasi.edit', $mutasi->id) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('mutasi_lokasi.destroy', $mutasi->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
