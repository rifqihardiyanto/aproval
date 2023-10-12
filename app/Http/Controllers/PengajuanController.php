<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $order = Order::where('id_member',  auth::guard('webmember')->user()->id)->latest()->get();
        return view('member.datapengajuan', compact('order'));
    }

    public function view_pengajuan()
    {   
        $member = Member::where('id', auth::guard('webmember')->user()->id)->get();
        return view('member.pengajuan', compact('member'));
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
        //validate form
        $order = Order::create([
            'id_member' => $request->id_member,
            'nama_pemohon' => $request->nama_pemohon,
            'keperluan' => $request->keperluan,
            'keterangan' => $request->keterangan,
            'jumlah' => $request->jumlah,
            'harga' => $request->harga,
            'total_harga' => $request->total_harga,
            'status' => $request->status,
        ]);

        //upload image
        // $image = $request->file('image');
        // $image->storeAs('public/posts', $image->hashName());

        //create post

        //redirect to index
        return redirect()->route('pengajuan')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
