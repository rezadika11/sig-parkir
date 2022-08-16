<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardUserController extends Controller
{
    public function Home()
    {
        $data = DB::table('lokasi')
            ->join('kecamatan', 'kecamatan.id_kecamatan', 'lokasi.id_kecamatan')
            ->join('desa', 'desa.id_desa', 'lokasi.id_desa')
            ->select('id_lokasi', 'nama_lokasi', 'juru_parkir', 'jalan', 'foto', 'latitude', 'longitude', 'kecamatan.nama_kecamatan', 'desa.nama_desa')
            ->get();
        $kecamatan = DB::table('kecamatan')
            ->select('id_kecamatan', 'nama_kecamatan')
            ->orderBy('nama_kecamatan', 'asc')
            ->get();



        return view('user.index', compact('data', 'kecamatan'));
    }
    public function getAjaxDesa($id)
    {
        $desa = DB::table('desa')
            ->where('id_kecamatan', $id)
            ->pluck('nama_desa', 'id_desa');

        return json_encode($desa);
    }
 
    public function getLocation(Request $request)
    {
        $data  = DB::table('lokasi')
            ->join('kecamatan', 'kecamatan.id_kecamatan', 'lokasi.id_kecamatan')
            ->join('desa', 'desa.id_desa', 'lokasi.id_desa')
            ->select('id_lokasi', 'nama_lokasi', 'juru_parkir', 'jalan', 'foto', 'latitude', 'longitude', 'kecamatan.nama_kecamatan', 'desa.nama_desa')
            ->where([
                'lokasi.id_kecamatan' => $request->input('kecamatan') ?? '',
                'lokasi.id_desa' => $request->input('desa') ?? ''
            ])
            ->get();

        return view('user.location', compact('data'));
    }
}
