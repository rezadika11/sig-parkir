<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    public function Home(){
            $data = DB::table('lokasi')
               ->join('kecamatan','kecamatan.id_kecamatan','lokasi.id_kecamatan')
               ->join('desa','desa.id_desa','lokasi.id_desa')
               ->select('id_lokasi','nama_lokasi','juru_parkir','jalan','foto','latitude','longitude','kecamatan.nama_kecamatan','desa.nama_desa')
               ->get();


       return view('user.index', compact('data'));
    }
}
