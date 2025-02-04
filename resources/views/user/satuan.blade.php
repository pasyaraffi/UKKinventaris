@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1>Daftar Satuan</h1>

    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Satuan</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $satuan)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $satuan->satuan }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection 