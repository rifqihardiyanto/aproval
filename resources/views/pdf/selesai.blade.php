@extends('member.layout.index')
@section('title', 'Data Pengajuan')

@section('container')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Template</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
            integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <style>
            body {
                width: 100%;
                height: 100%;
                margin: 0;
                padding: 0;
                color: #000;
            }

            .headerTable {
                background-color: rgb(46, 198, 245) !important;
            }

            @media print {
                body {
                    -webkit-print-color-adjust: exact;
                }

                .headerTable {
                    background-color: #5353ec !important;
                    print-color-adjust: exact;
                }
            }
        </style>
    </head>

    <body>
        <div class="container">
            {{-- <div class="row mb-3 justify-content-center">
                <img src="{{ url('header.jpg') }}" style="width:100%;">
            </div> --}}

            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="{{ url('print/' . $order->id) }}"
                        data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </a>
                    {{-- <a class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
                                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                                    Export
                                </a> --}}
                </div>
            </div>


            <div class="row mb-3 justify-content-center">
                <h3 class="mt-5"><b>FORM PENGAJUAN</b></h3>
            </div>

            <div class="row">
                <div class="col">
                    <h5>Kepada <br>
                        {{ $order->created_at->format('d/m/y') }} <br>
                        MANAGER NASHIR <br>
                        Di tempat</h5>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <h5>Melalui surat ini, Saya</h5>
                </div>
            </div>
            <div class="row">
                <div class="col-2">
                    <h5><b>NAMA</b></h5>
                </div>
                <div class="col">
                    <h5><b>: {{ $order->nama_pemohon }}</b></h5>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col">
                    <h5>Bermaksud mengajukan permohonan pengajuan dengan detail sebagia berikut</h5>
                </div>
            </div>

            <div class="row mb-3 justify-content-center">
                <table class="table" style="border:2px solid #000;">
                    <thead>
                        <tr style="border:2px solid #000;">
                            <th class="headerTable" style="border:2px solid #000;" scope="col">NAMA ITEM</th>
                            <th class="headerTable" style="border:2px solid #000;" scope="col">JUMLAH</th>
                            <th class="headerTable" style="border:2px solid #000;" scope="col">HARGA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td style="border:2px solid #000;">{{ $order->keperluan }}</td>
                            <td style="border:2px solid #000;">{{ $order->jumlah }}</td>
                            <td style="border:2px solid #000;">Rp. {{ number_format($order->harga) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-center" style="border:2px solid #000;"><b>TOTAL</b></td>
                            <td style="border:2px solid #000;">Rp. {{ number_format($order->total_harga) }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="row mb-5">
                <div class="col">
                    <h5>Demikian permohonan ini saya ajukan, atas perhatiannya saya ucapkan terima kasih.</h5>
                </div>
            </div>
            <br><br>
            <div class="row mt-5 mb-5">
                <div class="col">
                    <h5>{{ $order->nama_pemohon }}</h5>
                    <h5>Pemohon</h5>
                </div>
                <div class="col justify-content-right">
                    <h5 class="text-right">Rendie Tri Subagyo</h5>
                    <h5 class="text-right">Manager Operasional</h5>
                </div>
            </div>
            <br>
            <div class="row mt-5">
                <div class="col justify-content-center">
                    <h5 class="text-center">Eko Yulianto</h5>
                    <h5 class="text-center">Manager Keuangan</h5>
                </div>
            </div>


        </div>
    </body>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    </html>





@endsection
