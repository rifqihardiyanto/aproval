@extends('layout.index')


@section('container')
    <!-- Bootstrap Table with Header - Dark -->
    <div class="card">
        <h5 class="card-header">Pengajuan</h5>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th>No</th>
                        <th>Tanggal Pengajuan</th>
                        <th>Nama Pemohon</th>
                        <th>Keperluan</th>
                        <th>Total Harga</th>
                        <th>Konfirmasi</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @foreach ($order as $data)
                    <tr>
                        <td><i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$loop->iteration}}</strong></td>
                        <td>{{ $data->created_at->format('d M Y') }}</td>
                        <td>{{ $data->nama_pemohon }}</td>
                        <td>{{ $data->keperluan }}</td>
                        <td>Rp. {{ number_format($data->total_harga) }}</td>
                        <td><a href="{{ url('pengajuan/operasional') }}/{{ $data->id }}"><button class="btn btn-primary">Lihat</button></a></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <!--/ Bootstrap Table with Header Dark -->
@endsection


