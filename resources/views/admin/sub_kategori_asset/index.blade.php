@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Sub Kategori Asset</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('sub_kategori_asset.create') }}" class="btn btn-primary mb-3">Tambah Sub Kategori Asset</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode Sub Kategori Asset</th>
                <th>Nama Sub Kategori Asset</th>
                <th>Kategori Asset</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $subKategori)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $subKategori->kode_sub_kategori_asset }}</td>
                    <td>{{ $subKategori->sub_kategori_asset }}</td>
                    <td>{{ $subKategori->kategoriAsset->kategori_asset }}</td>
                    <td>
                        <a href="{{ route('sub_kategori_asset.edit', $subKategori->id_sub_kategori_asset) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('sub_kategori_asset.destroy', $subKategori->id_sub_kategori_asset) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus sub kategori asset ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
