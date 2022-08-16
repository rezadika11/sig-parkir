<?php

namespace App\Http\Controllers\Lokasi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use post;

class LokasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }

    public function LokasiView()
    {
        $dataLokasi = DB::table('lokasi')
            ->join('desa', 'desa.id_desa', 'lokasi.id_desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan', 'lokasi.id_kecamatan')
            ->select('nama_lokasi', 'juru_parkir', 'jalan', 'foto', 'latitude', 'longitude', 'kecamatan.nama_kecamatan', 'desa.nama_desa', 'id_lokasi')
            ->orderBy('juru_parkir', 'asc')
            ->get();

        return view('lokasi.index', compact('dataLokasi'));
    }

    public function TambahLokasi()
    {
        $kecamatan = DB::table('kecamatan')
            ->select('id_kecamatan', 'nama_kecamatan')
            ->orderBy('nama_kecamatan', 'asc')
            ->get();

        return view('lokasi.tambahlokasi', compact('kecamatan'));
    }

    public function GetDesa($id)
    {
        $desa = DB::table('desa')
            ->where('id_kecamatan', $id)
            ->pluck('nama_desa', 'id_desa');

        return json_encode($desa);
    }

    public function SimpanLokasi(Request $request)
    {
        $validateData = $request->validate([
            'nama_lokasi' => 'required|max:255',
            'juru_parkir' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'desa' => 'required|max:255',
            'jalan' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
            'photo' => 'required|file|mimes:png,jpg,jpeg|max:2048',
        ]);

        DB::BeginTransaction();
        try {
            $request->merge([
                'id_kecamatan' => $request->input('kecamatan'),
                'id_desa' => $request->input('desa'),
                'foto' => $request->file('photo')->store('foto-lokasi')
            ]);

            $dataLokasi = DB::table('lokasi')
                ->insert($request->only('nama_lokasi', 'juru_parkir', 'id_kecamatan', 'id_desa', 'jalan', 'latitude', 'longitude', 'foto'));

            DB::commit();
            return redirect(route('lokasi.lokasiview'))
                ->with('suksesTambah', 'Data lokasi berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah', 'Terjadi Kesalahan');
        }
    }

    public function EditLokasi(Request $request, $id_lokasi)
    {

        $data = DB::table('lokasi')
            ->join('desa', 'desa.id_desa', 'lokasi.id_desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan', 'lokasi.id_kecamatan')
            ->where('id_lokasi', $id_lokasi)
            ->select('nama_lokasi', 'juru_parkir', 'jalan', 'foto', 'latitude', 'longitude', 'kecamatan.id_kecamatan', 'desa.id_desa', 'id_lokasi')
            ->first();

        $kecamatan = DB::table('kecamatan')
            ->select('id_kecamatan', 'nama_kecamatan')
            ->orderBy('nama_kecamatan', 'asc')
            ->get();


        return view('lokasi.editlokasi', compact('data', 'kecamatan'));
    }

    public function UpdateLokasi(Request $request, $id_lokasi)
    {
        $validateData = $request->validate([
            'nama_lokasi' => 'required|max:255',
            'juru_parkir' => 'required|max:255',
            'kecamatan' => 'required|max:255',
            'desa' => 'required|max:255',
            'jalan' => 'required|max:255',
            'latitude' => 'required|max:255',
            'longitude' => 'required|max:255',
        ]);

        DB::BeginTransaction();
        try {
            $request->merge([
                'id_kecamatan' => $request->input('kecamatan'),
                'id_desa' => $request->input('desa'),
                'foto' => $request->file('photo')->store('foto-lokasi')
            ]);

            if ($request->file('photo') == "") {
                DB::table('lokasi')
                    ->where('id_lokasi', $id_lokasi)
                    ->update([
                        'nama_lokasi' => $request->nama_lokasi,
                        'juru_parkir' => $request->juru_parkir,
                        'id_kecamatan' => $request->id_kecamatan,
                        'id_desa' => $request->id_desa,
                        'jalan' => $request->jalan,
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                    ]);
            } else {
                if ($request->oldImage) {
                    Storage::delete($request->oldImage);
                }
                DB::table('lokasi')
                    ->where('id_lokasi', $id_lokasi)
                    ->update([
                        'nama_lokasi' => $request->nama_lokasi,
                        'juru_parkir' => $request->juru_parkir,
                        'id_kecamatan' => $request->id_kecamatan,
                        'id_desa' => $request->id_desa,
                        'jalan' => $request->jalan,
                        'latitude' => $request->latitude,
                        'longitude' => $request->longitude,
                        'foto' => $request->foto,
                    ]);
            }
            DB::commit();
            return redirect(route('lokasi.lokasiview'))
                ->with('suksesEdit', 'Data lokasi berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah', 'Terjadi Kesalahan');
        }
    }

    public function HapusLokasi($id_lokasi)
    {
        DB::BeginTransaction();
        try {
            $data = DB::table('lokasi')
                ->where('id_lokasi', $id_lokasi)
                ->first();
            Storage::delete($data->foto);

            DB::table('lokasi')
                ->where('id_lokasi', $id_lokasi)
                ->delete();

            DB::commit();
            return redirect(route('lokasi.lokasiview'))
                ->with('suksesHapus', 'Data Lokasi berhasil di hapus');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah', 'Terjadi Kesalahan');
        }
    }
}
