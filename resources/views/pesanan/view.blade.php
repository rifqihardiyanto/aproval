@extends('layout.index')


@section('container')
<div class="content-wrapper" style="min-height: 762px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <center> <h2>PENGAJUAN PT NIAGA WASILAH AL KHAIR</h2> </center>
                   {{-- <h2><p align="center"></p></h2> --}}
                    {{-- <h1 class="m-0">PENGAJUAN</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pengajuan 1</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header">
    </div>
    <h3 class="m-0">Identitas User </h3>
    <!-- /.card-header -->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-2">
                <b>Tanggal Pengajuan</b>
            </div>
            <div class="col">
                : 25 August 2023, 02:10                     </div>
        </div>
        <div class="row">
            <div class="col-lg-2">
                <b>Member</b>
            </div>
            <div class="col">
                : ARI                  </div>
            </div>
        <div class="row">
            <div class="col-lg-2">
                <b>Nama Pemohon</b>
            </div>
            <div class="col">
                :  Aditya                    </div>
        </div>

    </div>
</div>

{{-- <div class="card">
    <div class="card-header">
    </div>
    <!-- /.card-header -->
    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Keperluan  </th>
                    <th>Keterangan</th>
                    <th>Jumlah</th>
                    <th>Harga(Rp)</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                                                                <tr>
                    <td>1</td>
                    <td>editor</td>
                    <td>pc untuk editing</td>
                    <td>1</td>
                    <td>Rp. 159,000</td>
                    <td>Rp. 164,000</td>
                </tr>
                                    </tbody>
        </table>
    </div> --}}
    <!-- /.card-body -->
</div>
<!-- /.card -->
<section class="content">
    <div class="container-fluid">
    <div class="card">
        <div class="card-header">
        </div>
        <h3 class="m-0">Kebutuhan User</h3>
        <!-- /.card-header -->
        <div class="card-body">
            <div class="row">
                <div class="col-lg-2">
                    <b>Keperluan</b>
                </div>
                <div class="col">
                    : editor                  </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <b>Keterangan</b>
                </div>
                <div class="col">
                    : pc untuk editing                  </div>
                </div>
            <div class="row">
                <div class="col-lg-2">
                    <b>Jumlah</b>
                </div>
                <div class="col">
                    :  Aditya                    </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <b>Harga(Rp)</b>
                </div>
                <div class="col">
                    :  Rp. 159,000                    </div>
            </div>
            <div class="row">
                <div class="col-lg-2">
                    <b>Total Harga</b>
                </div>
                <div class="col">
                    :  Rp. 159,000                     </div>
            </div>
        </div>
    </div>
<div class="card">
    <div class="card-header">
        <h3 class="card-title">STATUS PENGAJUAN </h3>
        {{-- <th></th> --}}
        <td >
            <a href="" data-id="${val.id}" class="btn btn-success btn-accept">Accept</a>
            <a href="" data-id="${val.id}" class="btn btn-danger btn-cancel">Cancel</a>
        </td>
    </div>

        {{-- <h1 align="left">Teks ini berada di kiri</h1>
        <h1 align="right">Teks ini berada di kanan</h1> --}}
    </div>

@endsection
