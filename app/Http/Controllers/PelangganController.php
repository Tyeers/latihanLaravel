<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    //Added this line of code
    public function index()
    {
        $profile = DB::table('profile')->get();

        return view('pelanggan.indexpelanggan');
    }

    public function tambahpelanggan()
    {
        return view('pelanggan.tambahpelanggan');
    }

    public function pelanggan(Request $request){
        
        $request->validate([
            'nama' => 'required|',
            'nohp' => 'required|',
            'alamat' => 'required|',
        ]);

        DB::table('profile')-> insert([
            'nama_lengkap' => $request->nama,
            'no_hp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/pelanggan');
    }
}


