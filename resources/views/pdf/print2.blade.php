<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data Pengajuan</title>
</head>
<body style="position: relative;
width: 21cm;  
height: 29.7cm; 
margin: 0 auto; 
color: #001028;
background: #FFFFFF; 
font-family: Arial, sans-serif; 
font-size: 17px; 
font-family: Arial;">
    <header style="padding: 10px 0;
    margin-bottom: 30px;" class="clearfix">
      <h1 style="border-top: 1px solid  #5D6975;
      border-bottom: 1px solid  #5D6975;
      color: #5D6975;
      font-size: 2.4em;
      line-height: 1.4em;
      font-weight: normal;
      text-align: left;
      margin: 0 0 10px 0;">DATA PENGAJUAN #{{ $order->id }}</h1>
      <div style="float: right;
      text-align: right; margin-right: 90px;" id="company" class="clearfix">
        <div style="margin-bottom: 10px;">PT. NIAGA WASILAH ALKHAIR</div>
        <div style="margin-bottom: 10px;">BUMIRESO, WONOSOBO<br /> KAB. WONOSOBO JAWA TENGAH</div>
        {{-- <div>(602) 519-0450</div>
        <div><a style="color: #5D6975;
  text-decoration: underline;" href="mailto:company@example.com">company@example.com</a></div> --}}
      </div>
      <div id="project">
        <div style="margin-bottom: 10px;"><span style="color: #5D6975;
            text-align: left;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;">Data</span>Pengajuan </div>
        <div style="margin-bottom: 10px;"><span style="color: #5D6975;
            text-align: left;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;">Nama</span>{{ $order->nama_pemohon }}</div>
        <div style="margin-bottom: 10px;"><span style="color: #5D6975;
            text-align: left;
            width: 52px;
            margin-right: 10px;
            display: inline-block;
            font-size: 0.8em;">DATE</span> {{ $order->created_at->format('d/m/y') }}</div>
    </header>
    <main style="margin-right: 90px">
      <table style="width: 100%;
      border-collapse: collapse;
      border-spacing: 0;
      margin-bottom: 20px;">
        <thead>
          <tr>
            <th style="padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal; text-align: center;" class="service">KEPERLUAN</th>
            <th style="padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal; text-align: center;" class="desc">KETERANGAN</th>
            <th style="padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal; text-align: center;">HARGA</th>
            <th style="padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal; text-align: center;">JUMLAH</th>
            <th style="padding: 5px 20px;
            color: #5D6975;
            border-bottom: 1px solid #C1CED9;
            white-space: nowrap;        
            font-weight: normal; text-align: center;">TOTAL</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="text-align: left; padding: 20px;
            text-align: left; vertical-align: top;" class="service">{{ $order->keperluan }}</td>
            <td style="text-align: left; padding: 20px;
            text-align: left; vertical-align: top;" class="desc">{{ $order->keterangan }}</td>
            <td style="padding: 20px;
            text-align: right; font-size: 1.2em; vertical-align: top;" class="unit">Rp. {{ $order->harga }}</td>
            <td style="padding: 20px;
            text-align: center; font-size: 1.2em; vertical-align: top;" class="qty">{{ $order->jumlah }}</td>
            
          </tr>
          {{-- <tr>
            <td style="text-align: center; padding: 20px;
            text-align: left;" colspan="4">SUBTOTAL</td>
            <td style="text-align: center; padding: 20px;
            text-align: right;" class="total">$5,200.00</td>
          </tr> --}}
          <tr>
            <td style="text-align: center; padding: 20px;
            text-align: left;" colspan="4" class="grand total">GRAND TOTAL</td>
            <td style="border-top: 1px solid #5D6975; text-align: center; padding: 20px;
            text-align: right;" class="grand total">Rp. {{ $order->total_harga }}</td>
          </tr>
        </tbody>
      </table>
      <div style="color: #5D6975;
      font-size: 1.2em;
      text-align: center" id="notices">
        <div>NOTE: {{ $order->status }}</div>
      </div>
    </main>

</body>
</html>