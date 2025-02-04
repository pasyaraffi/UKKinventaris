@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Tambah Depresiasi Baru</h1>

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

    <!-- Form untuk menambah data Depresiasi -->
    <form action="{{ route('depresiasi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="lama_depresiasi" class="form-label">Lama Depresiasi (bulan)</label>
            <input type="number" class="form-control" id="lama_depresiasi" name="lama_depresiasi" value="{{ old('lama_depresiasi') }}" min="1" max="600" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('depresiasi.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
