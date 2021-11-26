<?php

namespace App\Http\Controllers;

use App\Models\Holiday;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
    public function index()
    {
        return view('libur.index',[
            'holiday' => Holiday::all()
        ]);
    }

    public function store(Request $request)
    {
       $credentials = $request->validate([
            'hari' => 'required',
            'tgl' => 'required'
       ]);

    //    DB::table('karyawans')->updateOrInsert($credentials);
       if (Holiday::create($credentials)) {
            return redirect()->intended('libur');
       } 
       return redirect()->intended('/');
    }

    public function delete($post)
    {
        // dd(Karyawan::destroy($post));
        if (Holiday::destroy($post)) {
            return redirect()->intended('libur');
       } 
    }

    public function change($id)
    {
        $data = DB::table('holidays')->where('id',$id)->first();
        echo json_encode($data);
    }

    public function update(Request $request)
    {
       $credentials = $request->validate([
            'hari' => 'required',
            'tgl' => 'required'
       ]);

    //    DB::table('karyawans')->updateOrInsert($credentials);

       if (Holiday::where('hari', $request->hari)->update($credentials)) {
            return redirect()->intended('libur');
       } 
       return redirect()->intended('/');
    }
}
