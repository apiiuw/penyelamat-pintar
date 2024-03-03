<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 
use Illuminate\Support\Facades\Auth;

class OtentikasiController extends Controller
{
    public function login(Request $request){
    $credentials = $request->validate([
        'username'=>'required',
        'password'=>'required'
    ]);

    if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->intended('/')->with('berhasilLogin', "Selamat datang $request->username!!!");
    }else{

    return redirect()->intended('/masuk_akun')->with('fail', "Username atau password salah, silahkan coba kembali!");
    }

    }

         



    public function membuat(Request $request)
    {
        // Validasi data formulir
        $validated = $request->validate([
            'nama' => 'required|max:50',
            'username' => 'required|min:5|max:20|unique:users',
            'password' => 'required|min:8|max:20'
        ]);

        // Simpan data ke database
        $buatakun = new User; 
        $buatakun->nama = $request->nama;
        $buatakun->username = $request->username;
        $buatakun->password = $request->password;

        $buatakun->save();

        // Redirect dengan pesan sukses
        return redirect('/masuk_akun')->with('successCreate', "Akun $request->username berhasil dibuat, silahkan login!");
    }

    public function logout(Request $request){
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('notiflogout', "Anda telah logout dari akun!");
    }
}