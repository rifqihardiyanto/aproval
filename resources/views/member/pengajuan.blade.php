@extends('member.layout.index')
@section('title', 'Pengajuan')

@section('container')
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{ url('/pengajuan/store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-sm-10">
                                @foreach ($member as $data)
                                    <input class="form-control" hidden name="id_member" id="id_member" type="text"
                                        value="{{ $data->id }}" readonly>
                                @endforeach
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Pemohon</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama_pemohon" id="nama_pemohon" placeholder="John Doe" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Keperluan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keperluan" id="keperluan" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Keterangan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="keterangan" id="keterangan" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Jumlah</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="jumlah" id="jumlah"  placeholder="5"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Harga</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="harga" id="harga"  placeholder="50000"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Total Harga</label>
                            <div class="col-sm-3">
                                <input type="text" class="form-control" name="total_harga" id="total_harga"  placeholder="50000"/>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-sm-3">
                                <input type="text" hidden class="form-control" name="status" id="status" value="Baru"/>
                            </div>
                        </div>
                        <div class="row justify-content-end">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- / Content -->


@endsection
