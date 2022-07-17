<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('IsLogin');
    }
    
    public function Profil(){
        return view('admin.profil');
    }

    public function EditProfil(){

        $data = User::findOrFail(1)->first();
        return view('admin.editprofil', compact('data'));
    }
    public function PostEditProfil(Request $request){

        $validasi = $request->validate([
            'name' => 'required',
            'username' => 'required',

        ]);

        $data = DB::table('users')
                    ->where('id',1)
                    ->update([
                        'name' => $request->name,
                        'username' => $request->username,
                        'password' => Hash::make($request->password)
                    ]);

        return redirect(route('admin.profil'))->with('suksesEdit','Data Berhasil Di Edit');


    }
}
