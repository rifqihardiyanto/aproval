@extends('member.layout.index')
@section('title', 'Pengajuan')

@section('container')
    <!-- Begin Page Content -->
    {{-- <h1 class="h3 mb-4 text-gray-800">@yield('title')</h1> --}}
    <!-- /.container-fluid -->

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Form Pengajuan</div>
                <div class="card-body">
                    <form action="{{ url('/pengajuan/store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="nama">ID Member</label>
                            @foreach ($member as $data)
                            <input class="form-control" name="id_member" id="id_member" type="text" value="{{ $data->id }}" readonly>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label for="nama_pemohon">Nama Pemohon</label>
                            <input type="text" name="nama_pemohon" id="nama_pemohon" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keperluan</label>
                            <input type="text" name="keperluan" id="keperluan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="keperluan">Keterangan</label>
                            <input type="text" name="keterangan" id="keterangan" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="text" name="jumlah" id="jumlah" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <input type="text" name="harga" id="harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="total_harga">Total</label>
                            <input type="text" name="total_harga" id="total_harga" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <input class="form-control" name="status" id="status" type="text" value="Baru" readonly>
                        </div>
                        <button type="submit" class="btn btn-primary">Kirim Pengajuan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection


