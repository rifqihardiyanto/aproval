@extends('layout.index')


@section('container')
    <!-- Begin Page Content -->
    <h1 class="h3 mb-4 text-gray-800">{{ $title }}</h1>
    <!-- /.container-fluid -->

    <div class="card shadow">
        <div class="card-header">
            <div class="card-title">
                {{ $title }}
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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
                url: '/api/pengajuan/keuangan',
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
                            <td> ${val.harga} </td> 
                            <td> ${rupiah(val.total_harga)} </td> 
                            <td>
                                <a href="" data-id="${val.id}" class="btn btn-success btn-accept">Accept</a>    
                                <a href="" data-id="${val.id}" class="btn btn-danger btn-cancel">Cancel</a>    
                            </td>
                        </tr>`;
                    });

                    $('tbody').append(row);
                }
            });

            $(document).on('click', '.btn-accept', function() {
                const id = $(this).data('id')


                $.ajax({
                    url: '/api/pengajuan/ubah_status/' + id,
                    type: "POST",
                    data: {
                        status: 'dikonfirmasi-keuangan'
                    },
                    headers: {
                        "Authorization": "Bearer" + token
                    },
                    success: function(data) {
                        location.reload()
                    }
                })
            })

            $(document).on('click', '.btn-cancel', function() {
                const id = $(this).data('id')


                $.ajax({
                    url: '/api/pengajuan/ubah_status/' + id,
                    type: "POST",
                    data: {
                        status: 'ditolak-keuangan'
                    },
                    headers: {
                        "Authorization": "Bearer" + token
                    },
                    success: function(data) {
                        location.reload()
                    }
                })
            })
        });
    </script>
@endpush
