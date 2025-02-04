@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Depresiasi</h1>

    <!-- Menampilkan error validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form untuk mengedit data Depresiasi -->
    <form action="{{ route('depresiasi.update', $depresiasi->id_depresiasi) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="lama_depresiasi" class="form-label">Lama Depresiasi (tahun)</label>
            <input type="number" class="form-control" id="lama_depresiasi" name="lama_depresiasi" value="{{ old('lama_depresiasi', $depresiasi->lama_depresiasi) }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $depresiasi->keterangan) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
