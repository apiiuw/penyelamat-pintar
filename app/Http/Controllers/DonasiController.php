<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\financial_donations; 
use App\Models\goods_donations; 

class DonasiController extends Controller
{
    public function prosesDonasiUang(Request $request)
    {
        // Validasi data formulir
        $validatedData = $request->validate([
            'nama_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'jumlah_donasi' => 'required|numeric',
            'bukti_donasi' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan data ke database
        $donasi = new financial_donations; 
        $donasi->nama_pengirim = $request->nama_pengirim;
        $donasi->alamat_pengirim = $request->alamat_pengirim;
        $donasi->jumlah_donasi = $request->jumlah_donasi;

        // Upload dan simpan file bukti_donasi
        if ($request->hasFile('bukti_donasi')) {
            $file = $request->file('bukti_donasi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bukti_transfer'), $fileName);
            $donasi->bukti_donasi = $fileName;
        }

        $donasi->save();

        // Redirect dengan pesan sukses
        return redirect('/amal_pintar')->with('success', "Terimakasih $request->nama_pengirim telah berdonasi keuangan di amal pintar!");
    }

    public function prosesDonasiBarang(Request $request)
    {
        // Validasi data formulir
        $validatedData = $request->validate([
            'nama_pengirim' => 'required',
            'alamat_pengirim' => 'required',
            'bentuk_barang' => 'required',
            'bukti_donasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan data ke database
        $donasi = new goods_donations; 
        $donasi->nama_pengirim = $request->nama_pengirim;
        $donasi->alamat_pengirim = $request->alamat_pengirim;
        $donasi->bentuk_barang = $request->bentuk_barang;

        // Upload dan simpan file bukti_donasi
        if ($request->hasFile('bukti_donasi')) {
            $file = $request->file('bukti_donasi');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('bukti_barang'), $fileName);
            $donasi->bukti_donasi = $fileName;
        }

        $donasi->save();

        // Redirect dengan pesan sukses
        return redirect('/amal_pintar')->with('success', "Terimakasih $request->nama_pengirim telah berdonasi barang di amal pintar!");
    }
}
