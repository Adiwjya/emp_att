<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KaryawanController extends Controller
{
    public function index()
    {
        return view('karyawan.index',[
            'karyawan' => Karyawan::all()
        ]);
    }

    public function store(Request $request)
    {
       $credentials = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required'
       ]);

    //    DB::table('karyawans')->updateOrInsert($credentials);
       if (Karyawan::create($credentials)) {
            return redirect()->intended('karyawan');
       } 
       return redirect()->intended('/');
    }

    public function delete($post)
    {
        // dd(Karyawan::destroy($post));
        if (Karyawan::destroy($post)) {
            return redirect()->intended('karyawan');
       } 
    }

    public function change($id)
    {
        $data = DB::table('karyawans')->where('id',$id)->first();
        echo json_encode($data);
    }

    public function update(Request $request)
    {
       $credentials = $request->validate([
            'nik' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telp' => 'required',
            'email' => 'required'
       ]);

    //    DB::table('karyawans')->updateOrInsert($credentials);

       if (Karyawan::where('nik', $request->nik)->update($credentials)) {
            return redirect()->intended('karyawan');
       } 
       return redirect()->intended('/');
    }

    public function k_shift($id)
    {
        return view('karyawan.shift',[
            'karyawan' => Karyawan::all()
        ]);
    }
}
