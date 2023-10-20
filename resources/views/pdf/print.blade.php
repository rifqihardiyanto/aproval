<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <div bgcolor="#f6f6f6" style="color: #333; height: 100%; width: 100%;" height="100%" width="100%">
        <table bgcolor="#f6f6f6" cellspacing="0" style="border-collapse: collapse; padding: 40px; width: 100%;"
            width="100%">
            <tbody>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td style="color: #999; font-size: 12px; padding: 0; text-align: right;"
                                        align="right">
                                        Wonosobo<br />
                                        Invoice #{{ $order->id }}<br />
                                        {{ $order->created_at->format('d/m/y') }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>

                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td bgcolor="#FFFFFF"
                        style="border: 1px solid #000; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table width="100%"
                            style="background: #f9f9f9; border-bottom: 1px solid #eee; border-collapse: collapse; color: #999;">
                            <tbody>
                            </tbody>
                        </table>
                    </td>
                    <td style="padding: 0;"></td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>
                <tr>
                    <td width="5px" style="padding: 0;"></td>
                    <td
                        style="border: 1px solid #000; border-top: 0; clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 0;">
                        <table cellspacing="0"
                            style="border-collapse: collapse; border-left: 1px solid #000; margin: 0 auto; max-width: 600px;">
                            <tbody>
                                <tr>
                                    <td valign="top" style="padding: 20px;">
                                        <h3
                                            style="
                                                border-bottom: 1px solid #000;
                                                color: #000;
                                                font-family: 'Helvetica Neue', Helvetica, Arial, 'Lucida Grande', sans-serif;
                                                font-size: 18px;
                                                font-weight: bold;
                                                line-height: 1.2;
                                                margin: 0;
                                                margin-bottom: 15px;
                                                padding-bottom: 5px;
                                            ">
                                            Pengajuan dari: {{ $order->nama_pemohon }}
                                        </h3>
                                        <table cellspacing="0" style="border-collapse: collapse; margin-bottom: 40px;">
                                            <tbody>
                                                <tr>
                                                    <td style="padding: 5px 20px 20px 10px;">Keperluan</td>
                                                    <td align="right" style="padding: 5px 20px 20px 90px;">{{ $order->keperluan }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 20px 20px 10px;">Keterangan</td>
                                                    <td align="right" style="padding: 5px 20px 20px 90px;">{{ $order->keterangan }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 20px 20px 10px;">Jumlah</td>
                                                    <td align="right" style="padding: 5px 20px 20px 90px;">{{ $order->jumlah }}</td>
                                                </tr>
                                                <tr>
                                                    <td style="padding: 5px 20px 20px 10px;">Harga</td>
                                                    <td align="right" style="padding: 5px 20px 20px 90px;">{{ $order->harga }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 20px 20px 10px;">
                                                        Total Harga</td>
                                                    <td align="right"
                                                        style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 20px 20px 90px;">
                                                        {{ $order->total_harga }}</td>
                                                </tr>
                                                <tr>
                                                    <td
                                                        style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 20px 20px 10px;">
                                                        Status</td>
                                                    <td align="right"
                                                        style="border-bottom: 2px solid #000; border-top: 2px solid #000; font-weight: bold; padding: 5px 20px 20px 90px;">
                                                        {{ $order->status }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 0;"></td>
                </tr>

                {{-- <tr style="color: #666; font-size: 12px;">
                    <td width="5px" style="padding: 10px 0;"></td>
                    <td style="clear: both; display: block; margin: 0 auto; max-width: 600px; padding: 10px 0;">
                        <table width="100%" cellspacing="0" style="border-collapse: collapse;">
                            <tbody>
                                <tr>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;">Questions?</h4>
                                        <p
                                            style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            Please visit our
                                            <a href="#" style="color: #666;" target="_blank">
                                                Support Center
                                            </a>
                                            with any questions.
                                        </p>
                                    </td>
                                    <td width="10%" style="padding: 10px 0;">&nbsp;</td>
                                    <td width="40%" valign="top" style="padding: 10px 0;">
                                        <h4 style="margin: 0;"><span class="il">Bootdey</span> Technologies</h4>
                                        <p
                                            style="color: #666; font-size: 12px; font-weight: normal; margin-bottom: 10px;">
                                            <a href="#">535 Mission St., 14th Floor San Francisco, CA 94105</a>
                                        </p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </td>
                    <td width="5px" style="padding: 10px 0;"></td>
                </tr> --}}
            </tbody>
        </table>
    </div>
</body>

</html>
