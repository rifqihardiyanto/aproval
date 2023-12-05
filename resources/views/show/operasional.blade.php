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
                    </tr>
                </thead>
                <tbody></tbody>
            </table>

            <div class="col-12">
                <div class="card mb-4">
                    <h5 class="card-header">Konfirmasi</h5>
                    <div class="card-body">
                        <div class="demo-inline-spacing">
                            <button type="button" data-id="{{ $order->id }}"
                                class="btn-accept btn btn-outline-success">Konfirmasi</button>
                            <a href="#modal" data-toogle="modal" data-id="{{ $order->id }}" type="button" class="btn btn-outline-danger modal-ubah" data-bs-toggle="modal"
                                data-bs-target="#basicModal">
                                Tolak
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="mt-3">
            <!-- Modal -->
            <div class="modal fade" id="basicModal" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel1">Tolak Pengajuan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form class="form-data">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col mb-3">
                                        <label for="nameBasic" class="form-label">Alasan</label>
                                        <input type="text" name="status" id="nameBasic" class="form-control" placeholder="Masukan Alasan" />
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                                    Close
                                </button>
                                <button class="btn btn-outline-danger">Tolak</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Responsive Table -->
@endsection

@push('js')
    <script>
        $(function() {
            function rupiah(angka) {
                const format = angka.toString().split('').reverse().join('');
                const convert = format.match(/\d{1,3}/g);
                return 'Rp ' + convert.join('.').split('').reverse().join('');
            }

            function date(date) {
                var date = new Date(date)
                var day = date.getDate();
                var month = date.getMonth() + 1;
                var year = date.getFullYear();

                return `${day}-${month}-${year}`;
            }

            const token = localStorage.getItem('token');

            $(document).on('click', '.btn-accept', function() {
                const id = $(this).data('id')


                $.ajax({
                    url: '{{ '/api/pengajuan/ubah_status/' }}' + id,
                    type: "POST",
                    data: {
                        status: 'dikonfirmasi-operasional'
                    },
                    headers: {
                        "Authorization": "Bearer" + token
                    },
                    success: function(data) {
                        if (!data.success) {
                            alert("Pengajuan Berhasil Dikonfirmasi!");
                            window.location.href = "{{ url('/pengajuan/operasional') }}";
                        }
                    }
                })
            })

            $(document).on('click', '.modal-ubah', function() {
                $('#modal-form').modal('show')
                const id = $(this).data('id');

                $.get('/api/orders/' + id, function({
                    data
                }) {
                    $('input[name="status"]').val('');
                })

                $('.form-data').submit(function(e) {
                    e.preventDefault()
                    const token = localStorage.getItem('token')

                    const frmdata = new FormData(this);

                    $.ajax({
                        url: `{{ '/api/orders/' }}${id}?_method=PUT`,
                        type: 'POST',
                        data: frmdata,
                        cache: false,
                        contentType: false,
                        processData: false,
                        headers: {
                            "Authorization": "Bearer" + token
                        },
                        success: function(data) {
                            if (data.success) {
                                alert("Pengajuan Berhasil Ditolak!");
                                window.location.href = "{{ url('/pengajuan/operasional') }}";
                            }
                        }
                    })
                })

            })
        });
    </script>
@endpush
