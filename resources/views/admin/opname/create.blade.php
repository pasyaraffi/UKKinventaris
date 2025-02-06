@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="text-primary">🆕 Tambah Data Opname</h1>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('opname.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="id_pengadaan" class="form-label">📦 Pengadaan</label>
                    <select name="id_pengadaan" id="id_pengadaan" class="form-control" required>
                        <option value="" disabled selected>Pilih Pengadaan</option>
                        @foreach($pengadaan as $item)
                            <option value="{{ $item->id_pengadaan }}">{{ $item->kode_pengadaan }} - {{ $item->no_invoice }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="tgl_opname" class="form-label">📅 Tanggal Opname</label>
                    <input type="date" name="tgl_opname" id="tgl_opname" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="kondisi" class="form-label">🔍 Kondisi</label>
                    <select name="kondisi" id="kondisi" class="form-control" required onchange="toggleKeterangan()">
                        <option value="Bagus">Bagus</option>
                        <option value="Rusak">Rusak</option>
                        <option value="Hilang">Hilang</option>
                    </select>
                </div>

                <div class="mb-3" id="keterangan-field" style="display: none;">
                    <label for="keterangan" class="form-label">📝 Keterangan</label>
                    <textarea name="keterangan" id="keterangan" class="form-control" maxlength="100"></textarea>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('opname.index') }}" class="btn btn-secondary"><i class="fas fa-arrow-left"></i> Kembali</a>
                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function toggleKeterangan() {
        var kondisi = document.getElementById('kondisi').value;
        var keteranganField = document.getElementById('keterangan-field');
        if (kondisi === 'Rusak' || kondisi === 'Hilang') {
            keteranganField.style.display = 'block';
        } else {
            keteranganField.style.display = 'none';
        }
    }
</script>
@endsection
