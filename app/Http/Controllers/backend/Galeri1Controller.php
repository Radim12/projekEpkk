<?php

namespace App\Http\Controllers\backend;

use App\Models\Galeri;
use App\Models\Ttd;
use App\Models\Ttds;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;

class Galeri1Controller extends Controller
{
    public function index()
{
    $pertama = Galeri::where('bidang', 'Penghayatan & Pengamalan Pancasila')
                     ->whereIn('status', ['Proses', 'Upload'])
                     ->count();

    $kedua = Galeri::where('bidang', 'Gotong Royong')
                   ->whereIn('status', ['Proses', 'Upload'])
                   ->count();

    $ketiga = Galeri::where('bidang', 'Kader Pokja 1')
                    ->whereIn('status', ['Proses', 'Upload'])
                    ->count();

    return view('backend.galeripokja1', compact('pertama', 'kedua', 'ketiga'));
}

    public function filter(Request $request)
    {
        $bulan = $request->search;
        $tahun = $request->search2;
        $galeri = Galeri::where('created_at', $bulan)->get(); // Filter data berdasarkan bulan
        return view('backend.cetak_galeri_bulan_pokja1', compact('galeri'));
    }

    public function show(Request $request, string $tanggal)
    {

        if ($request->has('search')) {
            $penghayatan = Galeri::where('created_at', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'Penghayatan & Pengamalan Pancasila')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();
            $gotong = Galeri::where('created_at', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'gotong royong')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();
            $kader = Galeri::where('created_at', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'Kader Pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $penghayatan1 = Galeri::where('created_at', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'Penghayatan & Pengamalan Pancasila')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();
            $gotong1 = Galeri::where('created_at', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'Gotong Royong')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();
            $kader1 = Galeri::where('created_at', 'LIKE', '%' . $request->search . '%')->where('pokja', 'pokja I')->where('bidang', 'Kader Pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM');

            $pertama = Galeri::where('bidang', 'Penghayatan & Pengamalan Pancasila')->where('status', 'Upload')->get();

            $tanggal2 = $request->input('search');

            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja I')->get();
            $wakil = Ttds::where('jabatan', 'Wakil Ketua I')->get();

            return view('backend.cetak_galeri_bulan_pokja1', compact('penghayatan', 'gotong', 'kader', 'tanggal', 'tanggal2', 'penghayatan1', 'gotong1', 'kader1', 'ketua', 'wakil'));
        } elseif ($request->has('search2')) {
            $janu = 1;
            $jan = Galeri::whereMonth('created_at', $janu)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $febr = 2;
            $feb = Galeri::whereMonth('created_at', $febr)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $mare = 3;
            $mar = Galeri::whereMonth('created_at', $mare)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $apri = 4;
            $apr = Galeri::whereMonth('created_at', $apri)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $meii = 5;
            $mei = Galeri::whereMonth('created_at', $meii)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $juni = 6;
            $jun = Galeri::whereMonth('created_at', $juni)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $juli = 7;
            $jul = Galeri::whereMonth('created_at', $juli)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $agus = 8;
            $agu = Galeri::whereMonth('created_at', $agus)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $sept = 9;
            $sep = Galeri::whereMonth('created_at', $sept)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $okto = 10;
            $okt = Galeri::whereMonth('created_at', $okto)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $nove = 11;
            $nov = Galeri::whereMonth('created_at', $nove)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $dese = 12;
            $des = Galeri::whereMonth('created_at', $dese)->where('created_at', 'LIKE', '%' . $request->search2 . '%')->where('pokja', 'pokja I')->where('status', 'Upload')->orderBy('created_at', 'ASC')->get();

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');

            $tanggal2 = $request->input('search2');

            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja I')->get();
            $wakil = Ttds::where('jabatan', 'Wakil Ketua I')->get();

            return view('backend.cetak_galeri_tahun_pokja1', compact(
                'jan',
                'feb',
                'mar',
                'apr',
                'mei',
                'jun',
                'jul',
                'agu',
                'sep',
                'okt',
                'nov',
                'des',
                'tanggal',
                'tanggal2',
                'ketua',
                'wakil'
            ));
        } else {
        }
    }
}
