@extends('member.layout.index')
@section('title', 'Data Pengajuan')

@section('container')
    <!-- Begin Page Content -->
    <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1>
    <!-- /.container-fluid -->

    <div class="card shadow">
        <div class="card-header">
            <div class="card-title">
                Data @yield('title')
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Id Member</th>
                            <th>Nama Pemohon</th>
                            <th>Keperluan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                        </tr>
                        @foreach ($order as $data )
                            <tr>
                                <th>{{$loop->iteration}} </th>
                                <th>{{ $data->id_member }}</th>
                                <th>{{ $data->nama_pemohon }}</th>
                                <th>{{ $data->keperluan }}</th>
                                <th>{{ $data->jumlah }}</th>
                                <th>{{ $data->harga }}</th>
                                <th>{{ $data->total_harga }}</th>
                                <th>{{ $data->keterangan }}</th>
                                <th>{{ $data->status }}</th>
                            </tr>
                        @endforeach
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


