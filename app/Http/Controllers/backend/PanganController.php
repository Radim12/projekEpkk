<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Ttd;
use App\Models\Ttds;
use App\Models\Pangan;
use App\Models\Sandang;
use App\Models\Perumahan;
use Illuminate\Http\Request;
use App\Models\LaporanPokja3;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PanganController extends Controller
{
    public function index() {
        $data = DB::table('laporan_pangan')
        ->join('penggunas', 'laporan_pangan.id_user', '=', 'penggunas.id')
        ->select('laporan_pangan.*', 'penggunas.nama_kec')
        ->where('laporan_pangan.status', 'proses')
        ->orderBy('id_pokja3_bidang1', 'desc')
        ->get();

        return view('backend.pangan', compact('data'));
    }

    public function edit(string $id_pokja3_bidang1)
    {
        $data = Pangan::find($id_pokja3_bidang1);
        return view('backend.tampil_pangan', compact('data'));
    }
    public function update(Request $request, string $id_pokja3_bidang1)
    {
        $data = Pangan::find($id_pokja3_bidang1);
            $data->update([
                'beras' => $request->beras,
                'non_beras' => $request->non_beras,
                'peternakan' => $request->peternakan,
                'perikanan' => $request->perikanan,
                'warung_hidup' => $request->warung_hidup,
                'lumbung_hidup' => $request->lumbung_hidup,
                'toga' => $request->toga,
                'tanaman_keras' => $request->tanaman_keras,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('pangan.index')->with(['success' => 'Berhasil Mengubah Status']);
    }

    public function filter(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $pangan= Pangan::where('tanggal', $bulan)->get(); // Filter data berdasarkan bulan

               if ($request->has('search')) {
            $pangan= DB::table('laporan_pangan')
            ->join('penggunas', 'laporan_pangan.id_user', '=', 'penggunas.id')
            ->select('laporan_pangan.*', 'penggunas.nama_kec')
            ->where('laporan_pangan.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_pangan.status', 'disetujui')
            ->get();

            $total1 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('beras');
            $total2 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('non_beras');
            $total3 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('peternakan');
            $total31 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('perikanan');
            $total4 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warung_hidup');
            $total5 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('lumbung_hidup');
            $total6 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('toga');
            $total7 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tanaman_keras');

         $sandang = DB::table('laporan_sandang')
         ->join('penggunas', 'laporan_sandang.id_user', '=', 'penggunas.id')
         ->select('laporan_sandang.*', 'penggunas.nama_kec')
         ->where('laporan_sandang.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_sandang.status', 'disetujui')
         ->get();

         $total24 = Sandang::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pangan');
         $total25 = Sandang::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('sandang');
         $total26 = Sandang::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jasa');

         $perumahan = DB::table('laporan_perumahan')
         ->join('penggunas', 'laporan_perumahan.id_user', '=', 'penggunas.id')
         ->select('laporan_perumahan.*', 'penggunas.nama_kec')
         ->where('laporan_perumahan.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_perumahan.status', 'disetujui')
         ->get();

         $total8 = Perumahan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('layak_huni');
         $total9 = Perumahan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tidak_layak');

         $laporanpokja3 = DB::table('laporan_kader_pokja3')
         ->join('penggunas', 'laporan_kader_pokja3.id_user', '=', 'penggunas.id')
         ->select('laporan_kader_pokja3.*', 'penggunas.nama_kec')
         ->where('laporan_kader_pokja3.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_kader_pokja3.status', 'disetujui')
         ->get();

         $total10 = LaporanPokja3::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pangan');
         $total11 = LaporanPokja3::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('sandang');
         $total12 = LaporanPokja3::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tata_laksana_rumah');
            
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM YYYY'); 
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja III')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_bulan_pokja3', compact('pangan', 'sandang', 'perumahan', 'laporanpokja3', 'total1', 'total2', 'total3', 'total4', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'total12', 'total24', 'total25', 'total26', 'total31', 'formattedDate', 'ketua', 'wakil', 'tanggal'));

        }elseif ($request->has('search2')){
            $pangan= DB::table('laporan_pangan')
            ->join('penggunas', 'laporan_pangan.id_user', '=', 'penggunas.id')
            ->select('laporan_pangan.*', 'penggunas.nama_kec')
            ->where('laporan_pangan.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_pangan.status', 'disetujui')
            ->get();

            $total1 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('beras');
            $total2 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('non_beras');
            $total3 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('peternakan');
            $total31 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('perikanan');
            $total4 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('warung_hidup');
            $total5 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('lumbung_hidup');
            $total6 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('toga');
            $total7 = Pangan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tanaman_keras');

         $sandang = DB::table('laporan_sandang')
         ->join('penggunas', 'laporan_sandang.id_user', '=', 'penggunas.id')
         ->select('laporan_sandang.*', 'penggunas.nama_kec')
         ->where('laporan_sandang.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_sandang.status', 'disetujui')
         ->get();

         $total24 = Sandang::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pangan');
         $total25 = Sandang::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('sandang');
         $total26 = Sandang::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jasa');

         $perumahan = DB::table('laporan_perumahan')
         ->join('penggunas', 'laporan_perumahan.id_user', '=', 'penggunas.id')
         ->select('laporan_perumahan.*', 'penggunas.nama_kec')
         ->where('laporan_perumahan.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_perumahan.status', 'disetujui')
         ->get();

         $total8 = Perumahan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('layak_huni');
         $total9 = Perumahan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tidak_layak');

         $laporanpokja3 = DB::table('laporan_kader_pokja3')
         ->join('penggunas', 'laporan_kader_pokja3.id_user', '=', 'penggunas.id')
         ->select('laporan_kader_pokja3.*', 'penggunas.nama_kec')
         ->where('laporan_kader_pokja3.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_kader_pokja3.status', 'disetujui')
         ->get();

         $total10 = LaporanPokja3::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pangan');
         $total11 = LaporanPokja3::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('sandang');
         $total12 = LaporanPokja3::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tata_laksana_rumah');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja III')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_tahun_pokja3', compact('pangan', 'sandang', 'perumahan', 'laporanpokja3', 'total1', 'total2', 'total3', 'total4', 'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'total12', 'total24', 'total25', 'total26', 'total31', 'formattedDate', 'ketua', 'wakil', 'tanggal'));
        }else{
            
        }
    }

    public function destroy(string $id_pokja3_bidang1)
    {
        
        $data = Pangan::find($id_pokja3_bidang1);

        $data->delete();

        return redirect()->route('pangan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
