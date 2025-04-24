<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Kesehatan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KelestarianLingkunganHidup;
use App\Models\PerencanaanSehat;
use Illuminate\Support\Facades\DB;
use App\Models\Ttd;
use App\Models\Ttds;

class KesehatanController extends Controller
{
    public function index(Request $request) {
        $data = DB::table('laporan_bidang_kesehatan')
        ->join('penggunas', 'laporan_bidang_kesehatan.id_user', '=', 'penggunas.id')
        ->select('laporan_bidang_kesehatan.*', 'penggunas.nama_kec')
        ->where('laporan_bidang_kesehatan.status', 'proses')
        ->orderBy('id_laporan_sehat', 'desc')
        ->get();
        return view('backend.kesehatan', compact('data'));
    }
    
    public function edit(string $id_laporan_sehat)
    {
        $data = Kesehatan::find($id_laporan_sehat);
        return view('backend.tampil_kesehatan', compact('data'));
    }
    public function update(Request $request, string $id_laporan_sehat)
    {
        $data = Kesehatan::find($id_laporan_sehat);
            $data->update([
                'jumlah_posyandu' => $request->jumlah_posyandu,
                'jumlah_posyandu_iterasi' => $request->jumlah_posyandu_iterasi,
                'jumlah_klp' => $request->jumlah_klp,
                'jumlah_anggota' => $request->jumlah_anggota,
                'jumlah_kartu_gratis' => $request->jumlah_kartu_gratis,
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('kesehatan.index')->with(['success' => 'Berhasil Mengubah Status']);
    }
    // public function filter(Request $request)
    // {
    //     $bulan = $request->bulan;
    //     $tahun = $request->tahun;
    //     $kesehatan = Kesehatan::where('tanggal', $bulan)->get(); // Filter data berdasarkan bulan
    //     return view('backend.cetak_bulan_kesehatan', compact('kesehatan'));
    // }
    
    public function show(Request $request)
    {
        if ($request->has('search')) {
            $kesehatan = DB::table('laporan_bidang_kesehatan')
            ->join('penggunas', 'laporan_bidang_kesehatan.id_user', '=', 'penggunas.id')
            ->select('laporan_bidang_kesehatan.*', 'penggunas.nama_kec')
            ->where('laporan_bidang_kesehatan.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_bidang_kesehatan.status', 'disetujui')
            ->get();

            $total = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_posyandu');
            $total1 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_posyandu_iterasi');
            $total2 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_klp');
            $total3 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota');
            $total4 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kartu_gratis');

             $kelestarian = DB::table('laporan_kelestarian_lingkungan_hidup')
            ->join('penggunas', 'laporan_kelestarian_lingkungan_hidup.id_user', '=', 'penggunas.id')
            ->select('laporan_kelestarian_lingkungan_hidup.*', 'penggunas.nama_kec')
            ->where('laporan_kelestarian_lingkungan_hidup.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_kelestarian_lingkungan_hidup.status', 'disetujui')
            ->get();
            $total5 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jamban');
            $total6 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('spal');
            $total7 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('tps');
            $total8 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('mck');
            $total9 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pdam');
            $total10 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('sumur');
            $total11 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('dll');

            $perencanaan = DB::table('laporan_perencanaan_sehat')
            ->join('penggunas', 'laporan_perencanaan_sehat.id_user', '=', 'penggunas.id')
            ->select('laporan_perencanaan_sehat.*', 'penggunas.nama_kec')
            ->where('laporan_perencanaan_sehat.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_perencanaan_sehat.status', 'disetujui')
            ->get();
            $total12 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('J_Psubur');
            $total13 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('J_Wsubur');
            $total14 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('Kb_p');
            $total15 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('Kb_w');
            $total16 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('Kk_tbg');
            
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM YYYY'); 
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja IV')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_bulan_pokja4', compact('kesehatan', 'total', 'total1', 'total2', 'total3', 'total4', 'tanggal', 'kelestarian',
            'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'perencanaan', 'total12', 'total13', 'total14', 'total15', 'total16', 'formattedDate', 'ketua', 'wakil'));
        }elseif ($request->has('search2')){
            $kesehatan = DB::table('laporan_bidang_kesehatan')
            ->join('penggunas', 'laporan_bidang_kesehatan.id_user', '=', 'penggunas.id')
            ->select('laporan_bidang_kesehatan.*', 'penggunas.nama_kec')
            ->where('laporan_bidang_kesehatan.tanggal', 'LIKE', '%' . $request->search2 . '%')
            ->where('laporan_bidang_kesehatan.status', 'disetujui')
            ->get();
            $total = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('jumlah_posyandu');
            $total1 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('jumlah_posyandu_iterasi');
            $total2 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('jumlah_klp');
            $total3 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('jumlah_anggota');
            $total4 = Kesehatan::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('jumlah_kartu_gratis');

            $kelestarian = DB::table('laporan_kelestarian_lingkungan_hidup')
            ->join('penggunas', 'laporan_kelestarian_lingkungan_hidup.id_user', '=', 'penggunas.id')
            ->select('laporan_kelestarian_lingkungan_hidup.*', 'penggunas.nama_kec')
            ->where('laporan_kelestarian_lingkungan_hidup.tanggal', 'LIKE', '%' . $request->search2 . '%')
            ->where('laporan_kelestarian_lingkungan_hidup.status', 'disetujui')
            ->get();
            $total5 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('jamban');
            $total6 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('spal');
            $total7 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('tps');
            $total8 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('mck');
            $total9 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('pdam');
            $total10 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('sumur');
            $total11 = KelestarianLingkunganHidup::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('dll');

            $perencanaan = DB::table('laporan_perencanaan_sehat')
            ->join('penggunas', 'laporan_perencanaan_sehat.id_user', '=', 'penggunas.id')
            ->select('laporan_perencanaan_sehat.*', 'penggunas.nama_kec')
            ->where('laporan_perencanaan_sehat.tanggal', 'LIKE', '%' . $request->search2 . '%')
            ->where('laporan_perencanaan_sehat.status', 'disetujui')
            ->get();
            $total12 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('J_Psubur');
            $total13 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('J_Wsubur');
            $total14 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('Kb_p');
            $total15 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('Kb_w');
            $total16 = PerencanaanSehat::where('tanggal', 'LIKE', '%' . $request->search2 . '%')->where('status', 'disetujui')->sum('Kk_tbg');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja IV')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_tahun_pokja4', compact('kesehatan', 'total', 'total1', 'total2', 'total3', 'total4', 'tanggal', 'kelestarian',
            'total5', 'total6', 'total7', 'total8', 'total9', 'total10', 'total11', 'perencanaan', 'total12', 'total13', 'total14', 'total15', 'total16', 'formattedDate', 'ketua', 'wakil'));
        }else{
            
        }
      
    }
    public function destroy(string $id_laporan_sehat)
    {
        
        $data = Kesehatan::find($id_laporan_sehat);

        $data->delete();

        return redirect()->route('kesehatan.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
