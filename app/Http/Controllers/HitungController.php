<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HitungController extends Controller
{
    public function hitung(){
        $bill=5;
        $bill2= 10;
        $hasil = $bill+$bill2;
        return view('hitung', ['hasiljumlah' => $hasil]);
    }
}
