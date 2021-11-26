<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function authenticate(Request $request)
    {
        // $user = DB::table('users')->where('name',$request->input('username'))->where('password',$request->input('password'))->count();
        // if ($user>0) {
        //     $data = DB::table('users')->where('name','admingx')->first();
        //     session(
        //         ['name'=>$data->name],
        //         ['email'=>$data->email]
        //     );
        //     return redirect()->intended('dashboard');
        // }
        // return redirect()->intended('login');

        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }
        return redirect()->intended('login');
        // dd(Hash::make('admingx2021')); $2y$10$2WzOxMvg6X6YrTinYgK6k.tUJWrIuSuajcpHNuyqtVAOGf6JrChtG
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}
