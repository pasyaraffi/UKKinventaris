@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Edit Data Opname</h1>
    <form action="{{ route('opname.update', $opname->id_opname) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                @foreach($pengadaan as $item)
                    <option value="{{ $item->id_pengadaan }}" {{ $opname->id_pengadaan == $item->id ? 'selected' : '' }}>
                        {{ $item->kode_pengadaan }} - {{ $item->no_invoice }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" name="tgl_opname" id="tgl_opname" class="form-control" value="{{ $opname->tgl_opname }}" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" name="kondisi" id="kondisi" class="form-control" value="{{ $opname->kondisi }}" maxlength="25" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" maxlength="100">{{ $opname->keterangan }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('opname.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
