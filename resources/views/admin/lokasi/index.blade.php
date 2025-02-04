@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Lokasi</h1>
        <a href="{{ route('lokasi.create') }}" class="btn btn-primary mb-3">Tambah Lokasi</a>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Kode Lokasi</th>
                    <th>Nama Lokasi</th>
                    <th>Keterangan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($lokasi as $lokasiItem)
                    <tr>
                        <td>{{ $lokasiItem->id_lokasi }}</td>
                        <td>{{ $lokasiItem->kode_lokasi }}</td>
                        <td>{{ $lokasiItem->nama_lokasi }}</td>
                        <td>{{ $lokasiItem->keterangan }}</td>
                        <td>
                            <a href="{{ route('lokasi.edit', $lokasiItem->id_lokasi) }}" class="btn btn-warning">Edit</a>
                            <form action="{{ route('lokasi.destroy', $lokasiItem->id_lokasi) }}" method="POST" style="display:inline;">
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
