<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{
    public function __construct()
    {
     $this->middleware('auth:api', ['except' => 'index']);   
    } 

    public function get_reports(Request $request)
    {
        $report = DB::table('order_details')
        ->join('products', 'products.id', '=', 'order_details.id_produk')
        ->select(DB::raw('
            products.id as id_barang,
            nama_barang,
            count(*) as jumlah_dibeli,
            harga,
            SUM(total*jumlah) as pendapatan,
            SUM(jumlah) as total_qty
            '))
        ->whereRaw("date(order_details.created_at) >= '$request->dari'")
        ->whereRaw("date(order_details.created_at) <= '$request->sampai'")
        ->groupBy('id_produk', 'nama_barang', 'harga', 'products.id')
        ->get();

        return response()->json([
            'data' => $report
        ]);
    }

    public function index(Request $request)
    {
        return view('report.index', [
            'title' => 'Laporan'
        ]);
    }
}
