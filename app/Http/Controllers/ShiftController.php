<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ShiftController extends Controller
{
    public function index()
    {
        return view('shift.index',[
            'shift' => Shift::all()
        ]);
    }

    public function store(Request $request)
    {
       $credentials = $request->validate([
            'shift' => 'required',
            'shift_start' => 'required',
            'shift_end' => 'required',
       ]);

    //    DB::table('Shifts')->updateOrInsert($credentials);
       if (Shift::create($credentials)) {
            return redirect()->intended('shift');
       } 
       return redirect()->intended('/');
    }

    public function delete($post)
    {
        // dd(Shift::destroy($post));
        if (Shift::destroy($post)) {
            return redirect()->intended('shift');
       } 
    }

    public function change($id)
    {
        $data = DB::table('shifts')->where('id',$id)->first();
        echo json_encode($data);
    }

    public function update(Request $request)
    {
       $credentials = $request->validate([
        'id' => 'required',
        'shift' => 'required',
        'shift_start' => 'required',
        'shift_end' => 'required',
       ]);

    //    DB::table('karyawans')->updateOrInsert($credentials);

       if (Shift::where('id', $request->id)->update($credentials)) {
            return redirect()->intended('shift');
       } 
       return redirect()->intended('/');
    }
}
