@extends('layout.index')


@section('container')
    <!-- Begin Page Content -->
    <h1 class="h3 mb-4 text-gray-800">Barang</h1>
    <!-- /.container-fluid -->

    <div class="card shadow">
        <div class="card-header">
            <div class="card-title">
                Data Barang
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-end mb-4">
                <a href="#modal-form" class="btn btn-primary modal-tambah">Tambah Data</a>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kategori</th>
                            <th>Subkategori</th>
                            <th>Nama Barang</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Harga</th>
                            <th>Diskon</th>
                            <th>Bahan</th>
                            <th>Tags</th>
                            <th>SKU</th>
                            <th>Ukuran</th>
                            <th>Warna</th>
                            <th>Aksi</th>
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
                    <h5 class="modal-title">Form Barang</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form class="form-barang">
                                <div class="form-group">
                                    <label for="">Kategori</label>
                                    <select name="id_category" required id="id_category">
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_category }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Sub Kategori</label>
                                    <select name="id_subcategory" required id="id_subcategory">
                                        @foreach ($subcategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->nama_subcategory }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="">Nama Barang</label>
                                    <textarea type="text" class="form-control" name="nama_barang" placeholder="Nama Barang"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Gambar</label>
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                                <div class="form-group">
                                    <label for="">Deskripsi</label>
                                    <textarea type="text" class="form-control" name="deskripsi" cols="30" rows="10" placeholder="Deskripsi"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Harga</label>
                                    <textarea type="text" class="form-control" name="harga" placeholder="Harga"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Diskon</label>
                                    <textarea type="text" class="form-control" name="diskon" placeholder="Diskon"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Bahan</label>
                                    <textarea type="text" class="form-control" name="bahan" cols="30" rows="10" placeholder="Bahan"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Tags</label>
                                    <textarea type="text" class="form-control" name="tags" placeholder="Tags"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Sku</label>
                                    <textarea type="text" class="form-control" name="sku" placeholder="Sku"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Ukuran</label>
                                    <textarea type="text" class="form-control" name="ukuran" placeholder="Ukuran"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="">Warna</label>
                                    <textarea type="text" class="form-control" name="warna" placeholder="Warna"></textarea>
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
            $.ajax({
                url: '/api/products',
                success: function({
                    data
                }) {

                    let row;
                    data.map(function(val, index) {
                        row += `
                        <tr> 
                            <td> ${index+1} </td> 
                            <td> ${val.category.nama_category} </td> 
                            <td> ${val.subcategory.nama_subcategory} </td> 
                            <td> ${val.nama_barang} </td> 
                            <td> <img src='/uploads/${val.gambar}' width="100" height="100"> </td> 
                            <td> ${val.deskripsi} </td> 
                            <td> ${val.harga} </td> 
                            <td> ${val.diskon} </td> 
                            <td> ${val.bahan} </td> 
                            <td> ${val.tags} </td> 
                            <td> ${val.sku} </td> 
                            <td> ${val.ukuran} </td> 
                            <td> ${val.warna} </td> 
                            <td>
                                <a  data-toogle="modal" href="#modal-form" data-id="${val.id}" class="btn btn-warning modal-ubah">Edit </a>    
                                <a  href="#" data-id="${val.id}" class="btn btn-danger btn-hapus">Hapus </a>    
                            </td>
                        </tr>`;
                    });

                    $('tbody').append(row);
                }
            });

            $(document).on('click', '.btn-hapus', function() {
                const id = $(this).data('id');
                const token = localStorage.getItem('token');

                confirm_dialog = confirm('Yakin ingin menghapus?');

                if (confirm_dialog) {
                    $.ajax({
                        url: '/api/products/' + id,
                        type: "DELETE",
                        headers: {
                            "Authorization": "Bearer" + token
                        },
                        success: function(data) {
                            if (!data.success) {
                                alert("Data berhasil di hapus");
                                location.reload();
                            }

                        }
                    })
                }

            })

            $('.modal-tambah').click(function() {
                $('#modal-form').modal('show')
                $('input[name="nama_category"]').val('');
                $('textarea[name="nama_subcategory"]').val('');
                $('textarea[name="nama_barang"]').val('');
                $('textarea[name="deskripsi"]').val('');
                $('textarea[name="harga"]').val('');
                $('textarea[name="diskon"]').val('');
                $('textarea[name="bahan"]').val('');
                $('textarea[name="tags"]').val('');
                $('textarea[name="sku"]').val('');
                $('textarea[name="ukuran"]').val('');
                $('textarea[name="warna"]').val('');

                $('.form-barang').submit(function(e) {
                    e.preventDefault()
                    const token = localStorage.getItem('token')

                    const frmdata = new FormData(this);

                    $.ajax({
                        url: 'api/products',
                        type: 'POST',
                        data: frmdata,
                        cache: false,
                        contentType: false,
                        processData: false,
                        headers: {
                            "Authorization": "Bearer" + token
                        },
                        success: function(data) {
                            if (!data.success) {
                                alert("Data berhasil Ditambah");
                                location.reload();
                            }
                        }
                    })
                })
            });

            $(document).on('click', '.modal-ubah', function() {
                $('#modal-form').modal('show')
                const id = $(this).data('id');

                $.get('api/products/' + id, function({
                    data
                }) {
                    $('input[name="nama_category"]').val(data.nama_category);
                    $('textarea[name="nama_subcategory"]').val(data.nama_subcategory);
                    $('textarea[name="nama_barang"]').val(data.nama_barang);
                    $('textarea[name="deskripsi"]').val(data.deskripsi);
                    $('textarea[name="harga"]').val(data.harga);
                    $('textarea[name="diskon"]').val(data.diskon);
                    $('textarea[name="bahan"]').val(data.bahan);
                    $('textarea[name="tags"]').val(data.tags);
                    $('textarea[name="sku"]').val(data.sku);
                    $('textarea[name="ukuran"]').val(data.ukuran);
                    $('textarea[name="warna"]').val(data.warna);
                })

                $('.form-barang').submit(function(e) {
                    e.preventDefault()
                    const token = localStorage.getItem('token')

                    const frmdata = new FormData(this);

                    $.ajax({
                        url: `api/products/${id}?_method=PUT`,
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
                                alert("Data berhasil Diubah");
                                location.reload();
                            }
                        }
                    })
                })

            })
        });
    </script>
@endpush
