<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\LaporanPokja4;
use App\Http\Controllers\Controller;

class AccLaporanPokja4Controller extends Controller
{
    public function index(){

        $lap1 = LaporanPokja4::where('status', 'proses')->count();
        $lap2 = LaporanPokja4::where('status', 'disetujui')->count();
    
        return view('backend.acclaporanpokja4', compact('lap1', 'lap2'));
    }    

}