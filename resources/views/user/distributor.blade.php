@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Data Distributor</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Distributor</th>
                            <th>Alamat</th>
                            <th>No Telepon</th>
                            <th>Email</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $distributor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $distributor->nama_distributor }}</td>
                                <td>{{ $distributor->alamat }}</td>
                                <td>{{ $distributor->no_telp }}</td>
                                <td>{{ $distributor->email }}</td>
                                <td>{{ $distributor->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 