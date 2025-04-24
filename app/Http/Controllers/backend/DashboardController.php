<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;
use App\Models\Pengguna;
use App\Models\BidangUmum;
use App\Models\GotongRoyong;
use App\Models\Penghayatan;
use App\Models\Pendidikan;
use App\Models\Pengembangan;
use App\Models\Pangan;
use App\Models\Sandang;
use App\Models\Perumahan;
use App\Models\LaporanPokja1;
use App\Models\LaporanPokja3;
use App\Models\LaporanPokja4;
use App\Models\Kesehatan;
use App\Models\KelestarianLingkunganHidup;
use App\Models\PerencanaanSehat;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index(){
        $jmlh_user = Pengguna::count();
        $bidangumum = BidangUmum::where('status', 'disetujui')->orWhere('status', 'proses')->count();

        $bidang11 = GotongRoyong::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $bidang12 = Penghayatan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $laporan1 = LaporanPokja1::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $totalbidang1 = $bidang11 + $bidang12 + $laporan1;

        $bidang21 = Pendidikan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $bidang22 = Pengembangan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $totalbidang2 = $bidang21 + $bidang22;

        $bidang31 = Pangan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $bidang32 = Sandang::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $bidang33 = Perumahan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $laporan3 = LaporanPokja3::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $totalbidang3 = $bidang31 + $bidang32 + $bidang33 + $laporan3;

        $bidang41 = Kesehatan::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $bidang42 = KelestarianLingkunganHidup::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $bidang43 = PerencanaanSehat::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $laporan4 = LaporanPokja4::where('status', 'disetujui')->orWhere('status', 'proses')->count();
        $totalbidang4 = $bidang41 + $bidang42 + $bidang43 + $laporan4;

        return view('backend.dashboard', compact('jmlh_user', 'bidangumum', 'totalbidang1', 'totalbidang2', 'totalbidang3', 'totalbidang4',));
    }

}