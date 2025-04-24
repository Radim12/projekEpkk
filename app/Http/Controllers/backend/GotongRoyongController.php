<?php

namespace App\Http\Controllers\backend;

use Carbon\Carbon;
use App\Models\Ttd;
use App\Models\Ttds;
use App\Models\Penghayatan;
use App\Models\GotongRoyong;
use Illuminate\Http\Request;
use App\Models\LaporanPokja1;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class GotongRoyongController extends Controller
{
    public function index() {
        $data = DB::table('laporan_gotong_royong')
        ->join('penggunas', 'laporan_gotong_royong.id_user', '=', 'penggunas.id')
        ->select('laporan_gotong_royong.*', 'penggunas.nama_kec')
        ->where('laporan_gotong_royong.status', 'proses')
        ->orderBy('id_pokja1_bidang2', 'desc')
        ->get();
        return view('backend.gotongroyong', compact('data'));
    }

    public function edit(string $id_pokja1_bidang2)
    {
        $data = GotongRoyong::find($id_pokja1_bidang2);
        return view('backend.tampil_gotongroyong', compact('data'));
    }
    public function update(Request $request, string $id_pokja1_bidang2)
    {
        $data = GotongRoyong::find($id_pokja1_bidang2);
            $data->update([
                'kerja_bakti' => $request->kerja_bakti,
                'rukun_kematian' => $request->rukun_kematian,
                'keagamaan' => $request->keagamaan,
                'jimpitan' => $request->jimpitan,
                'arisan' => $request->arisan, 
                'id_user' => $request->id_user,
                'status' => $request->status,
                'catatan' => $request->catatan,
                'tanggal' => $request->tanggal,
            ]);
        return redirect()->route('gotongroyong.index')->with(['success' => 'Berhasil Mengubah Status']);
    }

    public function filter(Request $request)
    {
        $bulan = $request->bulan;
        $tahun = $request->tahun;
        $gotongroyong= GotongRoyong::where('tanggal', $bulan)->get(); // Filter data berdasarkan bulan

               if ($request->has('search')) {
            $gotongroyong= DB::table('laporan_gotong_royong')
            ->join('penggunas', 'laporan_gotong_royong.id_user', '=', 'penggunas.id')
            ->select('laporan_gotong_royong.*', 'penggunas.nama_kec')
            ->where('laporan_gotong_royong.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_gotong_royong.status', 'disetujui')
            ->get();

            $total5 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kerja_bakti');
            $total6 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('rukun_kematian');
            $total7 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('keagamaan');
            $total8 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jimpitan');
            $total9 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('arisan');

         $penghayatan= DB::table('laporan_penghayatan_n_pengamalan')
         ->join('penggunas', 'laporan_penghayatan_n_pengamalan.id_user', '=', 'penggunas.id')
         ->select('laporan_penghayatan_n_pengamalan.*', 'penggunas.nama_kec')
         ->where('laporan_penghayatan_n_pengamalan.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_penghayatan_n_pengamalan.status', 'disetujui')
         ->get();

         $total12 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi1');
         $total13 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota1');
         $total14 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi2');
         $total15 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota2');
         $total16 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi3');
         $total17 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota3');
         $total18 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi4');
         $total19 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota4');

         $laporanpokja1= DB::table('laporan_kader_pokja1')
         ->join('penggunas', 'laporan_kader_pokja1.id_user', '=', 'penggunas.id')
         ->select('laporan_kader_pokja1.*', 'penggunas.nama_kec')
         ->where('laporan_kader_pokja1.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_kader_pokja1.status', 'disetujui')
         ->get();

         $total = LaporanPokja1::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('PKBN');
         $total1 = LaporanPokja1::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('PKDRT');
         $total2 = LaporanPokja1::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pola_asuh');
            
            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search');
            $carbonDate = Carbon::parse($tanggal);
            $tanggal = $carbonDate->isoFormat('MMMM YYYY'); 
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja I')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_bulan_pokja1', compact('gotongroyong', 'penghayatan', 'laporanpokja1', 'total', 'total1', 'total2', 'total5', 'total6', 'total7', 'total8', 'total9','total12', 'total13', 'total14', 'total15', 'total16','total17', 'total18', 'total19', 'formattedDate', 'ketua', 'wakil', 'tanggal'));

        }elseif ($request->has('search2')){
            $gotongroyong= DB::table('laporan_gotong_royong')
            ->join('penggunas', 'laporan_gotong_royong.id_user', '=', 'penggunas.id')
            ->select('laporan_gotong_royong.*', 'penggunas.nama_kec')
            ->where('laporan_gotong_royong.tanggal', 'LIKE', '%' . $request->search . '%')
            ->where('laporan_gotong_royong.status', 'disetujui')
            ->get();

            $total5 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('kerja_bakti');
            $total6 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('rukun_kematian');
            $total7 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('keagamaan');
            $total8 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jimpitan');
            $total9 = GotongRoyong::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('arisan');

         $penghayatan= DB::table('laporan_penghayatan_n_pengamalan')
         ->join('penggunas', 'laporan_penghayatan_n_pengamalan.id_user', '=', 'penggunas.id')
         ->select('laporan_penghayatan_n_pengamalan.*', 'penggunas.nama_kec')
         ->where('laporan_penghayatan_n_pengamalan.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_penghayatan_n_pengamalan.status', 'disetujui')
         ->get();

         $total12 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi1');
         $total13 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota1');
         $total14 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi2');
         $total15 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota2');
         $total16 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi3');
         $total17 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota3');
         $total18 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_kel_simulasi4');
         $total19 = Penghayatan::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('jumlah_anggota4');

         $laporanpokja1= DB::table('laporan_kader_pokja1')
         ->join('penggunas', 'laporan_kader_pokja1.id_user', '=', 'penggunas.id')
         ->select('laporan_kader_pokja1.*', 'penggunas.nama_kec')
         ->where('laporan_kader_pokja1.tanggal', 'LIKE', '%' . $request->search . '%')
         ->where('laporan_kader_pokja1.status', 'disetujui')
         ->get();

         $total = LaporanPokja1::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('PKBN');
         $total1 = LaporanPokja1::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('PKDRT');
         $total2 = LaporanPokja1::where('tanggal', 'LIKE', '%' . $request->search . '%')->where('status', 'disetujui')->sum('pola_asuh');

            $currentDate = Carbon::now();
            $formattedDate = $currentDate->isoFormat('dddd, D MMMM YYYY');
            $tanggal = $request->input('search2');
            $ketua = Ttd::where('jabatan', 'Ketua')->where('pokja', 'Kelompok Kerja I')->get();
            $wakil = Ttd::where('jabatan', 'Ketua')->where('id_ttds', '12')->get();

            return view('backend.cetak_tahun_pokja1', compact('gotongroyong', 'penghayatan', 'laporanpokja1', 'total', 'total1', 'total2', 'total5', 'total6', 'total7', 'total8', 'total9', 'total12', 'total13', 'total14', 'total15', 'total16','total17', 'total18', 'total19', 'formattedDate', 'ketua', 'wakil', 'tanggal'));
        }else{
            
        }
    }

    public function destroy(string $id_pokja1_bidang2)
    {
        
        $data = GotongRoyong::find($id_pokja1_bidang2);

        $data->delete();

        return redirect()->route('gotongroyong.index')->with(['success' => 'Berhasil Menghapus Laporan']);
    }
}
