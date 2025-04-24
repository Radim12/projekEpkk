<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\LaporanPokja3;
use App\Http\Controllers\Controller;

class AccLaporanPokja3Controller extends Controller
{
    public function index(){

        $lap1 = LaporanPokja3::where('status', 'proses')->count();
        $lap2 = LaporanPokja3::where('status', 'disetujui')->count();
    
        return view('backend.acclaporanpokja3', compact('lap1', 'lap2'));
    }    

}