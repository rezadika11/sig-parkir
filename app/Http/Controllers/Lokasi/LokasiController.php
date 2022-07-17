<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }

    public function LokasiView(){

        return view('lokasi.index');
    }

    public function TambahLokasi(){
        $kecamatan = DB::table('kecamatan')
                ->select('id_kecamatan','nama_kecamatan')
                ->get();
                
        return view('lokasi.tambahlokasi', compact('kecamatan'));
    }
    
}
