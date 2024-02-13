<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PelangganController extends Controller
{
    //Added this line of code
    public function index()
    {
        return view('pelanggan');
    }
}
