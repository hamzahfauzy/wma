<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BarangKeluar;
use App\Barang;

class BarangKeluarController extends Controller
{

    public function __construct()
    {
        $this->model = new BarangKeluar;
        $this->barang = Barang::get();
        $this->bulan = ['','Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('barang-keluar.index',[
            'model' => $this->model->get(),
            'bulan' => $this->bulan
        ]);
    }

    public function cetak()
    {
        //
        return view('barang-keluar.cetak',[
            'model' => $this->model->get(),
            'bulan' => $this->bulan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('barang-keluar.create',[
            'barang' => $this->barang,
            'bulan' => $this->bulan
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
            'barang_id' => 'required',
            'jumlah_keluar' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $this->model->create([
            'barang_id' => $request->barang_id,
            'jumlah_keluar' => $request->jumlah_keluar,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('barang-keluar.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BarangKeluar $barang)
    {
        //
        return view('barang-keluar.edit',[
            'barangKeluar' => $barang,
            'barang' => $this->barang,
            'bulan' => $this->bulan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $this->validate($request,[
            'barang_id' => 'required',
            'jumlah_keluar' => 'required',
            'bulan' => 'required',
            'tahun' => 'required',
        ]);

        $this->model->find($request->id)->update([
            'barang_id' => $request->barang_id,
            'jumlah_keluar' => $request->jumlah_keluar,
            'bulan' => $request->bulan,
            'tahun' => $request->tahun
        ]);

        return redirect()->route('barang-keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($barang)
    {
        //
        $this->model->find($barang)->delete();
        return redirect()->route('barang-keluar.index');
    }
}
