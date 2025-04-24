<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Penghayatan;
use App\Models\GotongRoyong;
use App\Models\LaporanPokja1;
use App\Http\Controllers\Controller;

class Pokja1Controller extends Controller
{
    public function index(){
        $modelPertama = Penghayatan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKedua = GotongRoyong::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKetiga = LaporanPokja1::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        
        return view('backend.pokja1', compact('modelPertama', 'modelKedua', 'modelKetiga'));
    }
}