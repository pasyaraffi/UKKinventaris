@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="text-primary">Edit Satuan</h1>

    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <div class="card p-4 shadow-sm">
        <form action="{{ route('satuan.update', $satuan->id_satuan) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="satuan" class="form-label">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan', $satuan->satuan) }}" required>
            </div>

            <div class="d-flex justify-content-end">
                <a href="{{ route('satuan.index') }}" class="btn btn-secondary me-2">Batal</a>
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection
