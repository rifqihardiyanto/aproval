<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['list', 'list_2', 'list_3', 'list_tolak']);
        $this->middleware('auth:api')->only(['store', 'update', 'destroy', 'ubah_status', 'baru', 'dikonfirmasi_1', 'dikonfirmasi_2', 'ditolak', 'selesai']);
    } 
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $order = Order::with('member')->get();

        return response()->json([
            'data' =>$order]);
    }

    public function list() {
        return view('pesanan.operasional', [
            'title' => 'Pengajuan Baru'
        ]);
    }
    public function list_2() {
        return view('pesanan.keuangan', [
            'title' => 'Pengajuan Baru'
        ]);
    }
    public function list_3() {
        return view('pesanan.admin', [
            'title' => 'Pengajuan Baru'
        ]);
    }
    public function list_4() {
        return view('pesanan.selesai', [
            'title' => 'Pengajuan Dikonfirmasi'
        ]);
    }

    public function list_tolak() {
        return view('pesanan.ditolak', [
            'title' => 'Pengajuan Ditolak'
        ]);
    }

    public function exportpdf(){
        $order = Order::with('member')->where('status', 'selesai')->orderBy('id', 'desc')->get();

        view()->share('order', $order);
        $pdf = Pdf::loadView('pdf.selesai');
        return $pdf->download('selesai.pdf');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id_member' => 'required',
            'nama_pemohon' => 'required',
            'keperluan' => 'required',
            'keterangan' => '',
            'jumlah' => 'required',
            'harga' => 'required',
            'total_harga' => 'required',
            'status' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();
        if ($request->has('gambar')){
            $gambar = $request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' .$gambar->getClientOriginalExtension();
            $gambar->move('uploads', $nama_gambar);
            $input['gambar'] =  $nama_gambar;
        }

        {
            $order = Order::create($input);

            return response()->json([
                'success' => true,
                'message' => 'Berhasil di Tambah',
                'data' => $order
            ]);
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        return response()->json([
            'data' => $order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        $validator = Validator::make($request->all(), [
            'id_member' => 'required'
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();
        $order->update($input);

        OrderDetail::where('id_order', $order['id'])->delete();

        for ($i=0; $i <count($input['id_produk']) ; $i++) { 
            OrderDetail::create([
                'id_order' => $order['id'],
                'id_produk' => $input['id_produk'][$i],
                'jumlah' => $input['jumlah'][$i],
                'size' => $input['sizeduk'][$i],
                'color' => $input['color'][$i],
                'total' => $input['total'][$i],
            ]);
        }

        return response()->json([
            'message' => 'Berhasil DiUpdate',
            'data' => $order
        ]);
    }

    public function ubah_status(Request $request, Order $order)
    {
        $order->update([
            'status'=> $request->status
        ]);

        return response()->json([
            'message' => 'success',
            'data' =>$order
        ]);
    }

    public function baru()
    {
        $order = Order::with('member')->where('status', 'baru')->orderBy('id', 'desc')->get();

        return response()->json([
            'data' =>$order
        ]);
    }

    public function dikonfirmasi_1()
    {
        $order = Order::with('member')->where('status', 'dikonfirmasi-operasional')->orderBy('id', 'desc')->get();

        return response()->json([
            'data' =>$order]);
    }

    public function dikonfirmasi_2()
    {
        $order = Order::with('member')->where('status', 'dikonfirmasi-keuangan')->orderBy('id', 'desc')->get();

        return response()->json([
            'data' =>$order]);
    }
    
    public function ditolak()
    {
        $order = Order::with('member')->where('status', 'ditolak-operasional')->orWhere('status', 'ditolak-keuangan')->orderBy('id', 'desc')->get();

        return response()->json([
            'data' =>$order]);
    }


    public function selesai()
    {
        $order = Order::with('member')->where('status', 'selesai')->orderBy('id', 'desc')->get();
        
        return response()->json([
            'data' =>$order]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        File::delete('uploads/' . $order->gambar);
        $order->delete();

        return response()->json([
            'message' => 'Berhasil Dihapus'
        ]);
    }
}
