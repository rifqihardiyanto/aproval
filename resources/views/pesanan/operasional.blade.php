@extends('layout.index')


@section('container')
    <!-- Begin Page Content -->
    <h1 class="h3 mb-4 text-gray-800">Data Pesanan</h1>
    <!-- /.container-fluid -->

    <div class="card shadow">
        <div class="card-header">
            <div class="card-title">
                Data Pesanan
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengajuan</th>
                            <th>Member</th>
                            <th>Nama Pemohon</th>
                            <th>Keperluan</th>
                            <th>Keterangan</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                            <th>Total Harga</th>
                            <th>Konfirmasi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Data Pengajuan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-data">
                                <div class="form-group">
                                    <label for="">Alasan</label>
                                    <input type="text" class="form-control" name="status"
                                        placeholder="Alasan">
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
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
            $.ajax({
                url: '{{ '/api/pengajuan/operasional' }}',
                headers: {
                    "Authorization": "Bearer" + token
                },
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        row += `
                        <tr> 
                            <td> ${index+1} </td> 
                            <td> ${date(val.created_at)} </td> 
                            <td> ${val.member.nama_member} </td> 
                            <td> ${val.nama_pemohon} </td> 
                            <td> ${val.keperluan} </td> 
                            <td> ${val.keterangan} </td> 
                            <td> ${val.jumlah} </td> 
                            <td> ${rupiah(val.harga)} </td> 
                            <td> ${rupiah(val.total_harga)} </td> 
                            <td>
                                <a href="" data-id="${val.id}" class="btn mb-2 btn-success btn-accept">Accept</a>    
                                <a data-toogle="modal" href="#modal-form" data-id="${val.id}" class="btn mb-2 btn-danger modal-ubah">Reject</a>    
                            </td>
                        </tr>`;
                    });

                    $('tbody').append(row);
                }
            });

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
                        if (!data.success){
                            alert("Pengajuan Berhasil Dikonfirmasi!");
                            location.reload()
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
                                location.reload();
                            }
                        }
                    })
                })
                
            })
        });
    </script>
@endpush
