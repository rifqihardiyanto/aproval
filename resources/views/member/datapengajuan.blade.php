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
                            <th>Nama Pemohon</th>
                            <th>Total</th>
                            <th>Konfirmasi</th>
                            <th>Lihat</th>
                        </tr>
                        @foreach ($order as $data )
                            <tr>
                                <th>{{$loop->iteration}} </th>
                                <th>{{ $data->nama_pemohon }}</th>
                                <th>Rp. {{ number_format($data->total_harga) }}</th>
                                <th>{{ $data->status }}</th>
                                <th><a href="{{ url('pengajuan/'.$data->id) }}"><button type="button" class="btn btn-info">Info</button></a></th>
                            </tr>
                        @endforeach
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


