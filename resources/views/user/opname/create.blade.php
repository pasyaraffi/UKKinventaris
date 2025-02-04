@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h1>Tambah Data Opname</h1>
    <form action="{{ route('opname.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_pengadaan" class="form-label">Pengadaan</label>
            <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                <option value="" disabled selected>Pilih Pengadaan</option>
                @foreach($pengadaan as $item)
                    <option value="{{ $item->id }}">{{ $item->kode_pengadaan }} - {{ $item->no_invoice }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="tgl_opname" class="form-label">Tanggal Opname</label>
            <input type="date" name="tgl_opname" id="tgl_opname" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="kondisi" class="form-label">Kondisi</label>
            <input type="text" name="kondisi" id="kondisi" class="form-control" maxlength="25" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <textarea name="keterangan" id="keterangan" class="form-control" maxlength="100"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('opname.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
