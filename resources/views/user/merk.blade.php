@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Merk</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Merk</th>
                            <th>Keterangan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $merk)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $merk->merk }}</td>
                                <td>{{ $merk->keterangan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 