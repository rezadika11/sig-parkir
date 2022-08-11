<?php

namespace App\Http\Controllers\Desa;

use App\Http\Controllers\Controller;
use Illuminate\Database\Events\TransactionCommitted;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DesaController extends Controller
{
    public function __construct()
    { 
        $this->middleware('IsLogin');
    }
    public function DesaView(){
      $data =  DB::table('desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan','desa.id_kecamatan' )
            ->select('kecamatan.nama_kecamatan','desa.*')
            ->orderBy('desa.nama_desa')
            ->get();
        return view('desa.index', compact('data'));
    }
    public function TambahDesa(){
        $kecamatan = DB::table('kecamatan')
                ->select('id_kecamatan','nama_kecamatan')
                ->orderBy('nama_kecamatan','asc')
                ->get();

        return view('desa.tambahdesa', compact('kecamatan'));
    }
    public function SimpanDesa(Request $request){
        $validasidesa = $request->validate([
            'nama_desa' => 'required',
            'id_kecamatan' => 'required'
        ]);

        DB::BeginTransaction();
        try{
            DB::table('desa')
                ->insert([
                    'nama_desa' => $request->nama_desa,
                    'id_kecamatan' => $request->id_kecamatan
                ]);
            
            DB::commit();
            return redirect(route('desa.desaview'))
                ->with('suksesTambah','Data desa berhasil ditambahkan');
        }catch(\Exception $e){
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah','Terjadi Kesalahan');
        }
    }

    public function EditDesa($id_desa){
        $data =  DB::table('desa')
            ->join('kecamatan', 'kecamatan.id_kecamatan','desa.id_kecamatan' )
            ->select('kecamatan.nama_kecamatan','desa.*')
            ->where('desa.id_desa', $id_desa)
            ->first();

        $kecamatan = DB::table('kecamatan')
            ->select('id_kecamatan','nama_kecamatan')
            ->get();

        return view('desa.editdesa', compact('data','kecamatan'));
    }

    public function UpdateDesa(Request $request, $id_desa){
        $request->validate([
            'nama_desa' => 'required',
            'id_kecamatan' => 'required'
        ]);
        

        DB::BeginTransaction();
        try {
           DB::table('desa')
                ->join('kecamatan','kecamatan.id_kecamatan','desa.id_kecamatan')
                ->where('desa.id_desa',$id_desa)
                ->update([
                    'nama_desa' => $request->nama_desa,
                    'desa.id_kecamatan' => $request->id_kecamatan
                ]);
            DB::commit();
            return redirect(route('desa.desaview'))
                ->with('suksesEdit','Data desa berhasil diubah');
        } catch (\Exception $e) {
            DB::rollBack();
            report($e);
            return redirect(url()->previous())
                ->withInput()
                ->with('gagalTambah','Terjadi Kesalahan');
        }
    }

    public function HapusDesa($id_desa){
        $deleteDesa = DB::table('desa')
                ->where('id_desa',$id_desa)
                ->delete();

        return redirect(route('desa.desaview'))
            ->with('suksesHapus','Data berhasil dihapus');
    }
}
