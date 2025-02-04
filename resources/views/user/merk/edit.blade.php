@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Edit Merk</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('merk.update', $merk->id_merk) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="merk" class="form-label">Merk</label>
            <input type="text" class="form-control" id="merk" name="merk" value="{{ old('merk', $merk->merk) }}" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ old('keterangan', $merk->keterangan) }}">
        </div>

        <button type="submit" class="btn btn-warning">Update</button>
    </form>
</div>
@endsection
