<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\View\View;

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
        $order = Order::with('member')->where('status', 'baru')->orderBy('id', 'desc')->get();
        return view('pengajuan.operasional', compact('order'));
    }
    public function list_2() {
        $order = Order::with('member')->where('status', 'dikonfirmasi-operasional')->orderBy('id', 'desc')->get();
        return view('pengajuan.keuangan', compact('order'));
    }
    public function list_3() {
        return view('pengajuan.admin', [
            'title' => 'Pengajuan Baru'
        ]);
    }
    public function list_4() {
        $order = Order::with('member')->where('status', 'selesai')->orderBy('id', 'desc')->get();
        return view('pengajuan.selesai', compact('order'));
    }

    public function list_tolak() {
        return view('pengajuan.ditolak', [
            'title' => 'Pengajuan Ditolak'
        ]);
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
    public function show(string $id): View
    {
        return view('pdf.selesai', [
            'order' => Order::findOrFail($id)
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
            'nama_member' => '',
            'nama_pemohon' => '',
            'keperluan' => '',
            'keterangan' => '',
            'jumlah' => '',
            'harga' => '',
            'total_harga' => '',
            'status' => 'required',
        ]);

        if ($validator->fails()){
            return response()->json($validator->errors(), 422);
        }

        $input = $request->all();
        $order->update($input);
        return response()->json([
            'success' => true,
            'message' => 'Konfirmasi Berhasil ',
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

    public function baru($id_order)
    {
        $order = Order::find($id_order)->with('member');
        return response()->json([
            'data' =>$order
        ]);
    }

    public function dikonfirmasi_1()
    {
        $order = Order::with('member')->where('status', 'dikonfirmasi-operasional')->get();

        return response()->json([
            'data' =>$order]);
    }

    public function dikonfirmasi_2()
    {
        $order = Order::with('member')->where('status', 'dikonfirmasi-keuangan')->get();

        return response()->json([
            'data' =>$order]);
    }
    
    public function ditolak()
    {
        $order = Order::with('member')->orderBy('id', 'desc')->get();

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

    public function print_pdf(string $id)
    {
        $order = Order::findOrFail($id);
    
        $pdf = PDF::loadview('pdf.print3',['order'=>$order]);
        return $pdf->stream();
    }

    public function show_operasional($id_order)
    {
        $order = Order::findOrFail($id_order);
        return view('show.operasional', compact('order'));
    }
    
    public function show_keuangan($id_order)
    {
        $order = Order::findOrFail($id_order);
        return view('show.keuangan', compact('order'));
    }

    public function show_member($id_order)
    {
        $order = Order::findOrFail($id_order);
        return view('show.member', compact('order'));
    }
    public function show_selesai($id_order)
    {
        $order = Order::findOrFail($id_order);
        return view('show.selesai', compact('order'));
    }
}
