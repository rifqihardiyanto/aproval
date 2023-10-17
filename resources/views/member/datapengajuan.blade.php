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
                    <!-- /.card-header -->
                    <div class="card-body table-responsive">
                        <div id="example1_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"><div class="dt-buttons btn-group flex-wrap">
                            <button class="btn btn-secondary buttons-copy buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Copy</span></button>
                            <button class="btn btn-secondary buttons-csv buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>CSV</span></button>
                            <button class="btn btn-secondary buttons-excel buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>Excel</span></button>
                            <button class="btn btn-secondary buttons-pdf buttons-html5" tabindex="0" aria-controls="example1" type="button"><span>PDF</span></button>
                            <button class="btn btn-secondary buttons-print" tabindex="0" aria-controls="example1" type="button"><span>Print</span></button>
                            </div>
                        </div>
                    </div>
                            <tbody>
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
                            <th>View</th>
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
                                <td class="tex-center" style="width:15%">
                                <a href="{{ url('/cetak') }}" class="btn btn-outline-primary  btn-sm"><i class="fa fa-eye"></i></i></a>
                            </tr>
                        @endforeach
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>


@endsection


