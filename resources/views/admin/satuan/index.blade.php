@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Satuan</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('satuan.create') }}" class="btn btn-primary mb-3">Tambah Satuan</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Satuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $satuan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $satuan->satuan }}</td>
                    <td>
                        <a href="{{ route('satuan.edit', $satuan->id_satuan) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('satuan.destroy', $satuan->id_satuan) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus satuan ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
