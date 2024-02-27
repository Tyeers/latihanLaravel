<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    //Added this line of code
    public function index()
    {
        return view('pelanggan.indexpelanggan');
    }
    public function tambahpelanggan()
    {
        return view('pelanggan.tambahpelanggan');
    }
}


