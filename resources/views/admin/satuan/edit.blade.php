@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Satuan</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('satuan.update', $satuan->id_satuan) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="satuan" class="form-label">Satuan</label>
            <input type="text" class="form-control" id="satuan" name="satuan" value="{{ old('satuan', $satuan->satuan) }}" required>
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('satuan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection
