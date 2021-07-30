<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Barang_keluar;
use Barryvdh\DomPDF\Facade as PDF;

use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function view_barang_masuk()
    {
        return view('laporan.barang-masuk.index');
    }
    public function view_barang_keluar()
    {
        return view('laporan.barang-keluar.index');
    }
    public function barang_masuk(Request $request)
    {
        $periode = $request->periode;
        if($periode == "all"){
            $data = Barang::all();
            $pdf = PDF::loadview('laporan.barang-masuk.print',compact('data','periode'))->setPaper('A4');
           return $pdf->stream('laporan-all.pdf');
        }else if($periode == "periode"){
        $tgl_awal = $request->awal;
        $tgl_akhir = $request->akhir;
        $data = Barang::whereBetween('created_at',[$tgl_awal,$tgl_akhir])
        ->orderBy('created_at','ASC')->get();
        $pdf = PDF::loadview('laporan.barang-masuk.print',compact('data','periode','tgl_awal','tgl_akhir'))->setPaper('A4');
        return $pdf->stream('laporan-periode-barang-masuk.pdf');
        }
       
    }
    public function barang_keluar(Request $request)
    {
        $periode2 = $request->periode;
        if($periode2 == "all"){
            $data2 = Barang_keluar::with("barang")->get();
            $pdf2 = PDF::loadview('laporan.barang-keluar.print',compact('data2','periode2'))->setPaper('A4');
           return $pdf2->stream('laporan-all.pdf');
        }else if($periode2 == "periode"){
        $tgl_awal2 = $request->awal;
        $tgl_akhir2 = $request->akhir;
        $data2 = Barang_keluar::whereBetween('created_at',[$tgl_awal2,$tgl_akhir2])
        ->orderBy('created_at','ASC')->get();
        $pdf2 = PDF::loadview('laporan.barang-keluar.print',compact('data2','periode2','tgl_awal2','tgl_akhir2'))->setPaper('A4');
        return $pdf2->stream('laporan-periode-barang-keluar.pdf');
        }
       
    }

}
