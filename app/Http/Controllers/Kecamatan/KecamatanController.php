<?php

namespace App\Http\Controllers\Kecamatan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KecamatanController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }
    public function KecamatanView(){
        $data = DB::table('kecamatan')
            ->select('id_kecamatan','nama_kecamatan')
            ->get();

        return view('kecamatan.index', compact('data'));
    }

    public function TambahKecamatan(){

        return view('kecamatan.tambahkecamatan');
    }

    public function SimpanKecamatan(Request $request){
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatan'
        ]);

        DB::BeginTransaction();
        try {
            DB::table('kecamatan')
                ->insert([
                    'nama_kecamatan' => $request->nama_kecamatan
                ]);
            DB::commit();
            return redirect(route('kecamatan.kecamatanview'))
            ->with('suksesTambah','Data desa berhasil ditambahkan');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah','Terjadi Kesalahan');
        }
    }

    public function EditKecamatan($id_kecamatan){
        $data = DB::table('kecamatan')
            ->select('kecamatan.*')
            ->where('id_kecamatan', $id_kecamatan)
            ->first();

        return view('kecamatan.editkecamatan', compact('data'));
    }

    public function UpdateKecamatan(Request $request, $id_kecamatan){
        $request->validate([
            'nama_kecamatan' => 'required|unique:kecamatan'
        ]);

        DB::BeginTransaction();
        try {
            DB::table('kecamatan')
                ->where('id_kecamatan', $id_kecamatan)
                ->update([
                    'nama_kecamatan' => $request->nama_kecamatan
                ]);
            DB::commit();
            return redirect(route('kecamatan.kecamatanview'))
                ->with('suksesEdit', 'Data kecamatan berhasil di edit');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah','Terjadi Kesalahan');
        }
    }

    public function HapusKecamatan($id_kecamatan){

            DB::BeginTransaction();
            try {
                DB::table('kecamatan')
                    ->where('id_kecamatan', $id_kecamatan)
                    ->delete();
                DB::commit();
                return redirect(route('kecamatan.kecamatanview'))
                    ->with('suksesHapus', 'Data kecamatan berhasil di hapus');
            } catch (\Exception $e) {
                DB::rollBack();
                report($e);
                return redirect(url()->previous())
                    ->withInput()
                    ->with('gagalTambah','Terjadi Kesalahan');
            }
    }
}
