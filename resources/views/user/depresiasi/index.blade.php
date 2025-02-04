@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Data Depresiasi</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('depresiasi.create') }}" class="btn btn-primary mb-3">Tambah Depresiasi</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Lama Depresiasi</th>
                <th>Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $depresiasi)
            <tr>
                <td>{{ $depresiasi->id_depresiasi }}</td>
                <td>{{ $depresiasi->lama_depresiasi }} tahun</td>
                <td>{{ $depresiasi->keterangan }}</td>
                <td>
                    <a href="{{ route('depresiasi.edit', $depresiasi->id_depresiasi) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('depresiasi.destroy', $depresiasi->id_depresiasi) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
