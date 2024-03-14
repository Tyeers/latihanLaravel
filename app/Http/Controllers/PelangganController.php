<?php

namespace App\Http\Controllers;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function Laravel\Prompts\confirm;

class PelangganController extends Controller
{
    //Added this line of code
    public function index()
    {
        $profile = DB::table('profile')->get();

        $title = 'Peringatan !';
        $text = "Apakah anda yakin ingin menghapus ?";
        $icon = "Question";
        confirmDelete($title, $text);

        return view('pelanggan.indexpelanggan', compact('profile'));
    }

    public function tambahpelanggan()
    {
        return view('pelanggan.tambahpelanggan');
    }

    public function edit($id)
{
    $profile = DB::table('profile')->find($id);
    return view('pelanggan.editpelanggan', compact('profile'));
}

public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'nohp' => 'required',
        'alamat' => 'required',
    ]);

    DB::table('profile')
        ->where('id', $id)
        ->update([
            'nama_lengkap' => $request->nama,
            'no_hp' => $request->nohp,
            'alamat' => $request->alamat,
        ]);

    Alert::success('Success', 'Data Berhasil di Update');
    return redirect('/pelanggan');
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

        Alert::success('Success', 'Data Berhasil');

        return redirect('/pelanggan');
    }

    public function destroy($id){
        $profile = DB::table('profile')->where('id', $id)->delete();
        Alert::success('Success', 'Data Berhasil di Hapus');
        return redirect('/pelanggan');
    }

    public function show($id){
            $profile = DB::table('profile')->find($id);
            return view ('pelanggan.detailpelanggan', compact('profile'));
    }
}


