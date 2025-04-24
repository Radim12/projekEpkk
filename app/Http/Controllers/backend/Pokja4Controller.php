<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;;
use App\Models\Kesehatan;
use App\Models\KelestarianLingkunganHidup;
use App\Models\PerencanaanSehat;
use App\Models\LaporanPokja4;
use App\Http\Controllers\Controller;

class Pokja4Controller extends Controller
{
    public function index(){

        $modelPertama = Kesehatan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKedua = KelestarianLingkunganHidup::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKetiga = PerencanaanSehat::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $modelKeempat = LaporanPokja4::where('status', 'disetujui')->orWhere('status', 'proses')->count();

        return view('backend.pokja4', compact('modelPertama', 'modelKedua', 'modelKetiga', 'modelKeempat'));
    }

}