<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }
    public function Dashboard()
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


        $dataLokasi = DB::table('lokasi')
            ->select('juru_parkir', 'id_lokasi')
            ->count('juru_parkir');

        $dataKecamatan = DB::table('kecamatan')
            ->select('nama_kecmatan')
            ->count('nama_kecamatan');

        $dataDesa = DB::table('desa')
            ->select('nama_desa')
            ->count('nama_desa');

        $dataJalan = DB::table('lokasi')
            ->select('jalan', 'id_lokasi')
            ->count('jalan');



        return view('dashboard.index', compact('data', 'dataLokasi', 'dataKecamatan', 'dataDesa', 'dataJalan', 'kecamatan'));
    }
    public function getAjaxDesa($id)
    {
        $desa = DB::table('desa')
            ->where('id_kecamatan', $id)
            ->pluck('nama_desa', 'id_desa');

        return json_encode($desa);
    }

    public function AjaxKecamatan()
    {
        $dataKec = DB::table('kecamatan')
            ->select('id_kecamatan', 'nama_kecamatan')
            ->get();

        return response()->json($dataKec);
    }

    public function FilterData(Request $request)
    {
        $keyword = $request->search;
        $data = DB::table('kecamatan')
            ->where('nama_kecamatan', 'like', "%" . $keyword . "%")
            ->get();

        $kecamatan = DB::table('kecamatan')
            ->select('id_kecamatan', 'nama_kecamatan')
            ->orderBy('nama_kecamatan', 'asc')
            ->get();


        $dataLokasi = DB::table('lokasi')
            ->select('juru_parkir', 'id_lokasi')
            ->count('juru_parkir');

        $dataKecamatan = DB::table('kecamatan')
            ->select('nama_kecmatan')
            ->count('nama_kecamatan');

        $dataDesa = DB::table('desa')
            ->select('nama_desa')
            ->count('nama_desa');

        $dataJalan = DB::table('lokasi')
            ->select('jalan', 'id_lokasi')
            ->count('jalan');



        return view('dashboard.index', compact('data', 'dataLokasi', 'dataKecamatan', 'dataDesa', 'dataJalan', 'kecamatan'));
    }
}
