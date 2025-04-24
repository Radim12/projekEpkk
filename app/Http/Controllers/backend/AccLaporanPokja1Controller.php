<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\LaporanPokja1;
use App\Http\Controllers\Controller;

class AccLaporanPokja1Controller extends Controller
{
    public function index(){

        $lap1 = LaporanPokja1::where('status', 'proses')->count();
        $lap2 = LaporanPokja1::where('status', 'disetujui')->count();
    
        return view('backend.acclaporanpokja1', compact('lap1', 'lap2'));
    }    

}