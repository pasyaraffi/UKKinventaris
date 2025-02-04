@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Tambah Pengadaan Baru</h2>
    
    <form action="{{ route('pengadaan.store') }}" method="POST">
        @csrf
        
        <!-- Dropdown Master Barang -->
        <div class="form-group">
            <label for="id_master_barang">Master Barang</label>
            <select name="id_master_barang" id="id_master_barang" class="form-control" required>
                <option value="">Pilih Master Barang</option>
                @foreach($masterBarang as $barang)
                    <option value="{{ $barang->id_master_barang }}">{{ $barang->nama_barang }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Depresiasi -->
        <div class="form-group">
            <label for="id_depresiasi">Depresiasi</label>
            <select name="id_depresiasi" id="id_depresiasi" class="form-control" required>
                <option value="">Pilih Depresiasi</option>
                @foreach($depresiasi as $item)
                    <option value="{{ $item->id_depresiasi }}">{{ $item->bulan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Merk -->
        <div class="form-group">
            <label for="id_merk">Merk</label>
            <select name="id_merk" id="id_merk" class="form-control" required>
                <option value="">Pilih Merk</option>
                @foreach($merk as $item)
                    <option value="{{ $item->id_merk }}">{{ $item->nama_merk }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Satuan -->
        <div class="form-group">
            <label for="id_satuan">Satuan</label>
            <select name="id_satuan" id="id_satuan" class="form-control" required>
                <option value="">Pilih Satuan</option>
                @foreach($satuan as $item)
                    <option value="{{ $item->id_satuan }}">{{ $item->satuan }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Sub Kategori Asset -->
        <div class="form-group">
            <label for="id_sub_kategori_asset">Sub Kategori Asset</label>
            <select name="id_sub_kategori_asset" id="id_sub_kategori_asset" class="form-control" required>
                <option value="">Pilih Sub Kategori</option>
                @foreach($subKategoriAsset as $item)
                    <option value="{{ $item->id_sub_kategori_asset }}">{{ $item->nama_sub_kategori }}</option>
                @endforeach
            </select>
        </div>

        <!-- Dropdown Distributor -->
        <div class="form-group">
            <label for="id_distributor">Distributor</label>
            <select name="id_distributor" id="id_distributor" class="form-control" required>
                <option value="">Pilih Distributor</option>
                @foreach($distributor as $item)
                    <option value="{{ $item->id_distributor }}">{{ $item->nama_distributor }}</option>
                @endforeach
            </select>
        </div>

        <!-- Input untuk kode pengadaan -->
        <div class="form-group">
            <label for="kode_pengadaan">Kode Pengadaan</label>
            <input type="text" name="kode_pengadaan" class="form-control" id="kode_pengadaan" value="{{ old('kode_pengadaan') }}" required>
        </div>

        <!-- Input untuk no_invoice -->
        <div class="form-group">
            <label for="no_invoice">No Invoice</label>
            <input type="text" name="no_invoice" class="form-control" id="no_invoice" value="{{ old('no_invoice') }}" required>
        </div>

        <!-- Input untuk no_seri_barang -->
        <div class="form-group">
            <label for="no_seri_barang">No Seri Barang</label>
            <input type="text" name="no_seri_barang" class="form-control" id="no_seri_barang" value="{{ old('no_seri_barang') }}" required>
        </div>

        <!-- Input untuk tahun_produksi -->
        <div class="form-group">
            <label for="tahun_produksi">Tahun Produksi</label>
            <input type="text" name="tahun_produksi" class="form-control" id="tahun_produksi" value="{{ old('tahun_produksi') }}" required>
        </div>

        <!-- Input untuk tgl_pengadaan -->
        <div class="form-group">
            <label for="tgl_pengadaan">Tanggal Pengadaan</label>
            <input type="date" name="tgl_pengadaan" class="form-control" id="tgl_pengadaan" value="{{ old('tgl_pengadaan') }}" required>
        </div>

        <!-- Input untuk harga_barang -->
        <div class="form-group">
            <label for="harga_barang">Harga Barang</label>
            <input type="number" name="harga_barang" class="form-control" id="harga_barang" value="{{ old('harga_barang') }}" required>
        </div>

        <!-- Input untuk nilai_barang -->
        <div class="form-group">
            <label for="nilai_barang">Nilai Barang</label>
            <input type="number" name="nilai_barang" class="form-control" id="nilai_barang" value="{{ old('nilai_barang') }}" required>
        </div>

        <!-- Input untuk fb -->
        <div class="form-group">
            <label for="fb">FB</label>
            <select name="fb" id="fb" class="form-control" required>
                <option value="0" {{ old('fb') == '0' ? 'selected' : '' }}>0</option>
                <option value="1" {{ old('fb') == '1' ? 'selected' : '' }}>1</option>
            </select>
        </div>

        <!-- Input untuk keterangan -->
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input type="text" name="keterangan" class="form-control" id="keterangan" value="{{ old('keterangan') }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
