<?php

namespace App\Http\Controllers\backend;

use App\Models\Ttd;
use App\Models\Ttds;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class Galeri4Controller extends Controller
{
    public function index(){
        $pertama = Galeri::where('bidang', 'kesehatan')->where('status', 'proses')->count();
        $kedua = Galeri::where('bidang', 'kelestarian lingkungan hidup')->where('status', 'proses')->count();
        $ketiga = Galeri::where('bidang', 'perencanaan sehat')->where('status', 'proses')->count();
        $keempat = Galeri::where('bidang', 'kader pokja 4')->where('status', 'proses')->count();

        return view('backend.galeripokja4', compact('pertama', 'kedua', 'ketiga', 'keempat'));
    }

    public function filter(Request $request)
    { 
        if ($request->has('search')) {
            $kesehatan = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'kesehatan')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            $kelestarian = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'kelestarian lingkungan hidup')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            $perencanaan = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'perencanaan sehat')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            $laporanpokja4 = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'kader pokja 4')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $kesehatan1 = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'kesehatan')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            $kelestarian1 = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'kelestarian lingkungan hidup')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            $perencanaan1 = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'perencanaan sehat')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            $laporanpokja41 = Galeri::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'kader pokja 4')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM'); 

            $tanggal2 = $request->input('search');
            
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja IV')->get();
            $wakil = Ttds::where('jabatan', 'Wakil Ketua I')->get();

            return view('backend.cetak_galeri_bulan_pokja4', compact('kesehatan', 'kelestarian', 'perencanaan', 'laporanpokja4', 'kesehatan1', 'kelestarian1', 'perencanaan1', 'laporanpokja41', 'tanggal', 'tanggal2', 'ketua', 'wakil'));
        }elseif ($request->has('search2')){
            $janu = 1;
            $jan = Galeri::whereMonth('tanggal', $janu)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            
            $febr = 2;
            $feb = Galeri::whereMonth('tanggal', $febr)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();
            
            $mare = 3;
            $mar = Galeri::whereMonth('tanggal', $mare)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $apri = 4;
            $apr = Galeri::whereMonth('tanggal', $apri)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $meii = 5;
            $mei = Galeri::whereMonth('tanggal', $meii)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $juni = 6;
            $jun = Galeri::whereMonth('tanggal', $juni)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $juli = 7;
            $jul = Galeri::whereMonth('tanggal', $juli)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $agus = 8;
            $agu = Galeri::whereMonth('tanggal', $agus)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $sept = 9;
            $sep = Galeri::whereMonth('tanggal', $sept)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $okto = 10;
            $okt = Galeri::whereMonth('tanggal', $okto)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $nove = 11;
            $nov = Galeri::whereMonth('tanggal', $nove)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $dese = 12;
            $des = Galeri::whereMonth('tanggal', $dese)->where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'upload')->orderBy('tanggal', 'ASC')->get();

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            
            $tanggal2 = $request->input('search2');

            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja IV')->get();
            $wakil = Ttds::where('jabatan', 'Wakil Ketua I')->get();

            return view('backend.cetak_galeri_tahun_pokja4', compact('jan', 'feb', 'mar', 'apr', 'mei', 'jun', 'jul', 'agu',
            'sep', 'okt', 'nov', 'des', 'tanggal', 'tanggal2', 'ketua', 'wakil'));
        }else{
            
        }
        
    }
}