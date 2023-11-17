<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
            font: 12pt "Tahoma";
        }

        h3 {
            text-align: center;
            justify-content: center;
            font-size: 16px;
        }

        h5 {
            text-align: left;
            font-size: 14px;
        }

        .alignleft {
            float: left;
        }

        .alignright {
            float: right;
        }

        .headerTable {
            background-color: rgb(46, 198, 245) !important;
        }

        .textbox {
            margin-bottom: 100px;
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
        <div class="row mb-3 justify-content-center">
            <img src="header.jpg" style="width:100%;">
        </div>

        <div class="row mb-3 justify-content-center">
            <h3 class="mt-5"><b>FORM PENGAJUAN</b></h3>
        </div>
        <div class="textbox">
            <div class="alignleft">
                <div class="row">
                    <div class="col">
                        <h5>Kepada <br>
                            MANAGER NASHIR <br>
                            Di tempat</h5>
                    </div>
                </div>
            </div>
            <div class="alignright">
                <div class="row">
                    <div class="col">
                        <h5>{{ $order->created_at->format('d/m/y') }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col">
                <h5>Melalui surat ini, Saya</h5>
            </div>
        </div>
        <div class="row">
            <div class="col-2">
                <h5><b>NAMA: {{ $order->nama_pemohon }} </b></h5>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col">
                <h5>Bermaksud mengajukan permohonan pengajuan dengan detail sebagia berikut</h5>
            </div>
        </div>


        <div class="row mb-1 justify-content-center">
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
                        <td style="border:2px solid #000;">{{  $order->jumlah }}</td>
                        <td style="border:2px solid #000;">Rp. {{ number_format ($order->harga) }}</td>
                    </tr>
                    <tr>
                        <td colspan="2" class="text-center" style="border:2px solid #000;"><b>TOTAL</b></td>
                        <td style="border:2px solid #000;">Rp. {{ number_format($order->total_harga) }}</td>
                    </tr>
                </tbody>
            </table>
            <div style="clear: both;">
        </div>
        <div class="row mb-5">
            <div class="col">
                <h5>Demikian permohonan ini saya ajukan, atas perhatiannya saya ucapkan terima kasih.</h5>
            </div>
        </div>
        <br><br>
        <div class="textbox">
            <div class="alignleft">
                <div class="row">
                    <div class="col">
                        <h5>{{ $order->nama_pemohon }}</h5>
                        <h5>Pemohon</h5>
                    </div>
                </div>
            </div>
            <div class="alignright">
                <div class="row">
                    <div class="col">
                        <h5>Rendie Tri Subagyo</h5>
                        <h5>Manager Operasional</h5>
                    </div>
                </div>
            </div>
        </div>
       
        <br>
        <div class="row mt-3">
            <div class="col justify-content-center keuangan">
                <h5 class="text-center">Eko Yulianto</h5>
                <h5 class="text-center">Manager Keuangan</h5>
            </div>
        </div>

    </div>
</body>


</html>
