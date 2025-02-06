@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary">Edit Depresiasi</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm p-4">
        <form action="{{ route('depresiasi.update', $depresiasi->id_depresiasi) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="lama_depresiasi" class="form-label fw-bold">Lama Depresiasi (bulan)</label>
                <input type="number" class="form-control" id="lama_depresiasi" name="lama_depresiasi" value="{{ old('lama_depresiasi', $depresiasi->lama_depresiasi) }}" min="1" max="600" required>
            </div>

            <div class="mb-3">
                <label for="keterangan" class="form-label fw-bold">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $depresiasi->keterangan) }}" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-warning"><i class="fas fa-save"></i> Update</button>
                <a href="{{ route('depresiasi.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection