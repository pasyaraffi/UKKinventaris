@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Sub Kategori Asset</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Sub Kategori Asset</th>
                            <th>Nama Sub Kategori Asset</th>
                            <th>Kategori Asset</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $subKategori)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $subKategori->kode_sub_kategori_asset }}</td>
                                <td>{{ $subKategori->sub_kategori_asset }}</td>
                                <td>{{ $subKategori->kategoriAsset->kategori_asset }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 