@extends('layout.index')

@section('container')
    <!-- Responsive Table -->
    <div class="card">
        <h5 class="card-header">Data Pengajuan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead>
                    <tr class="text-nowrap">

                    <tr>
                        <th>Tanggal Pengajuan :</th>
                        <td>{{ $order->created_at->format('d-m-Y') }}</td>
                    </tr>
                    <tr>
                        <th>Leader :</th>
                        <td>{{ $order->member->nama_member }}</td>
                    </tr>
                    <tr>
                        <th>Nama Pemohon :</th>
                        <td>{{ $order->nama_pemohon }}</td>
                    </tr>
                    <tr>
                        <th>Keperluan :</th>
                        <td>{{ $order->keperluan }}</td>
                    </tr>
                    <tr>
                        <th>Keterangan :</th>
                        <td>{{ $order->keterangan }}</td>
                    </tr>
                    <tr>
                        <th>Jumlah :</th>
                        <td>{{ $order->jumlah }}</td>
                    </tr>
                    <tr>
                        <th>Harga :</th>
                        <td>Rp. {{ number_format($order->harga) }}</td>
                    </tr>
                    <tr>
                        <th>Total Harga :</th>
                        <td>Rp. {{ number_format($order->total_harga) }}</td>
                    </tr>
                    <tr>
                        <th>Status :</th>
                        <td>{{ $order->status }}</td>
                    </tr>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <a href="{{ url('print/'.$order->id) }}"><button type="button" class="btn-accept btn btn-outline-primary">Print</button></a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!--/ Responsive Table -->
@endsection
