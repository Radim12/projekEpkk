<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Sandang;
use App\Models\Pangan;
use App\Models\Perumahan;
use App\Models\LaporanPokja3;
use App\Http\Controllers\Controller;

class Pokja3Controller extends Controller
{
    public function index(){
        $modelPertama = Pangan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKedua = Sandang::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKetiga = Perumahan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKeempat = LaporanPokja3::where('status', 'disetujui')->orWhere('status', 'proses')->count();

        return view('backend.pokja3', compact('modelPertama', 'modelKedua', 'modelKetiga', 'modelKeempat'));
    }

}