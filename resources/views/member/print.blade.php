

@extends('member.layout.index')
@section('title', 'Data Pengajuan')

@section('container')


<div class="content-wrapper" style="min-height: 762px;">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                   {{-- <h2><p align="center"></p></h2> --}}
                    {{-- <h1 class="m-0">PENGAJUAN</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">

                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <section class="content">
<div class="container-fluid">
<div class="card">
    <div class="card-header">

    <!-- /.card-header -->
    {{-- <img src="{{ URL::to('/public/img/gp.jpg') }}"> --}}
    <h3 style= text-align:center >DATA PENGAJUAN</h3>
    <div class="card-body">
        <b>Kepada</b>
        <p>MANAGER NASHIR</p>
        <i>Di tempat</i>
    </div>

    <p style="text-align:right">13 OKTOBER 2023</p>
        <p>Melalui surat ini, saya</p>
        <div class="row">
            <div class="col-lg-2">
                <b>Member</b>
            </div>
            <div class="col">
                : TIM TI                 </div>
            </div>
        <div class="row">
            <div class="col-lg-2">
                <b>Nama Pemohon</b>
            </div>
            <div class="col">
                :  Aditya                    </div>
        </div>
<p>Bermaksud mengajukan permohonan pengajuan dengan detail sebagai berikut</p>
<li>PERALATAN/ PERLENGKAPAN KERJA</li>
<li>PROMO</li>
<li>SDM</li>
<li>PRODUK</li>
<li>Lain-lain</li>
</ul>
<div class="card">
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
       <b>STATUS : </b>
       <P>Diterima Oleh </P>
       <i>( MGR Oprasiona )</i>
        {{-- <a href="" data-id="${val.id}" class="btn btn-success btn-accept">Diterima</a>
        <a href="" data-id="${val.id}" class="btn btn-danger btn-cancel">Ditolak</a> --}}

        {{-- <a href="{{ url('/show') }}" class="btn btn-primary btn-accept">Lihat Detail</a> --}}
    </div>

</div>



@endsection
